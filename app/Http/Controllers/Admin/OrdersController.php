<?php

namespace App\Http\Controllers\Admin;

use App\Clients;
use App\History;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MailController;
use App\News;
use App\Statuses;
use App\TypeOfVisas;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Schema;
use App\Orders;
use App\Http\Requests\CreateOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use Illuminate\Http\Request;

require('/var/www/html/prosperis-2/public/fpdf/fpdf.php');


class OrdersController extends Controller
{

    /**
     * Display a listing of orders
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {


        if(Auth::user()->role_id == 4){
            $orders = Auth::user()->orders->where('status_id','!=', 1);
            $words = LanguageController::orders('pl');

        }elseif(Auth::user()->role_id == 3){
            $orders = Orders::where('manager_id', Auth::user()->id)->get();
            $words = LanguageController::orders('ru');

        }else{
            $orders = Orders::all();
            $words = LanguageController::orders('ru');
        }


        return view('admin.orders.index')->with(['orders'=>$orders,'words'=>$words]);
    }

    /**
     * Show the form for creating a new orders
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        $clients = Clients::pluck('name', 'id');
        $users = User::where('role_id', 4)->pluck('name', 'id');
        $typeofvisas = TypeOfVisas::pluck('name', 'id');
        $statuses = Statuses::pluck('name', 'id');
        return view('admin.orders.create')->with(['clients' => $clients, 'users' => $users, 'typeofvisas' => $typeofvisas, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created orders in storage.
     *
     * @param CreateOrdersRequest|Request $request
     */
    public function store(CreateOrdersRequest $request)
    {
        $this->validate($request, [
            'payment' => 'integer',
            'prepayment' => 'integer',
            'client_id' => 'required|unique:orders'
        ]);

        $history = new History();
        $order = new Orders();
        $news = new News();

        $status = Statuses::find($request['status_id']);
        $typeofvisas = TypeOfVisas::find($request['type_visa_id']);
        $user = User::find($request['user_id']);
        $client = Clients::find($request['client_id']);
        $order->client_id = $request['client_id'];
        $order->user_id = $request['user_id'];
        $order->status_id = $request['status_id'];
        $order->type_visa_id = $request['type_visa_id'];
        $order->status($status);
        $order->typeOfVisa($typeofvisas);
        $order->user($user);
        $order->client($client);

        $order->pdf = OrdersController::makePDF($order);

        $imageName = str_random(30) . '.' .
            $request->file('scan_order_path')->getClientOriginalExtension();

        $request->file('scan_order_path')->move(
            base_path() . '/public/images/orders/', $imageName
        );

        $order->scan_order_path = '/images/orders/' . $imageName;

        $order->payment = $request['payment'];
        $order->prepayment = $request['prepayment'];
        $order->manager_id = $client->user_id;
        $order->save();
        $history->status_id = $request['status_id'];
        $history->status_old = 'новая';
        $history->order_id = $order->id;
        $history->status_current = $status->name;
        $history->status($status);
        $history->order($order);
        $history->save();
        $news->poland_id = $user->id;
        $news->manager_id = $client->user_id;
        $news->history_id = $history->id;
        $news->user(User::find($client->user_id));
        $news->history($history);
        if($request['status_id'] == 2){
            MailController::sendEmail($order->pdf);

        }
        if($request['status_id'] != 1){
            $news->poland_id = $request['user_id'];
        }
        $news->save();


        return redirect()->route(config('quickadmin.route') . '.orders.index');
    }

    /**
     * Show the form for editing the specified orders.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        if(Auth::user()->role_id == 4){
            $words = LanguageController::orders_edit('pl');
            $statuses = Statuses::pluck('name_pl', 'id');
            $typeofvisas = TypeOfVisas::pluck('name_pl', 'id');

        }else{
            $words = LanguageController::orders_edit('ru');
            $statuses = Statuses::pluck('name', 'id');
            $typeofvisas = TypeOfVisas::pluck('name', 'id');
        }
        $orders = Orders::find($id);

        $clients = Clients::pluck('name', 'id');
        $users = User::where('role_id', 4)->pluck('name', 'id');

        return view('admin.orders.edit')->with(['orders' => $orders, 'clients' => $clients, 'users' => $users, 'typeofvisas' => $typeofvisas, 'statuses' => $statuses, 'words' => $words]);
    }

    /**
     * Update the specified orders in storage.
     * @param UpdateOrdersRequest|Request $request
     *
     * @param  int $id
     */
    public function update($id, UpdateOrdersRequest $request)
    {
        $this->validate($request, [
            'payment' => 'integer',
            'prepayment' => 'integer',
            'client_id' => 'required'
        ]);

        $news = new News();
        $orders = Orders::findOrFail($id);
        if ($orders->status_id != $request['status_id']) {
            if($request['status_id'] == 2){
                MailController::sendEmail($orders->pdf);

            }


            if($request['status_id'] != 1){
                $news->poland_id = $request['user_id'];
            }


            $status = Statuses::find($request['status_id']);
            $history = new History();
            $history->status_id = $request['status_id'];
            $history->order_id = $orders->id;
            $history->status_old = $orders->status->name;
            $history->status_current = $status->name;
            $history->status($status);
            $history->order($orders);
            $history->save();
            $news->manager_id = $orders->client->user_id;
            $news->history_id = $history->id;
            $news->user(User::find($orders->client->user_id));
            $news->history($history);
            $news->save();
            MailController::updateStatus($history->order_id ,$history->status_old, $history->status_current, $history->created_at);
        }

        $orders->update($request->all());
        if ($request->file('scan_order_path') != null) {


            $imageName = str_random(30) . '.' .
                $request->file('scan_order_path')->getClientOriginalExtension();

            $request->file('scan_order_path')->move(
                base_path() . '/public/images/orders/', $imageName
            );

            $orders->scan_order_path = '/images/orders/' . $imageName;

        }
        $orders->save();


        return redirect()->route(config('quickadmin.route') . '.orders.index');
    }

    /**
     * Remove the specified orders from storage.
     *
     * @param  int $id
     */
    public function destroy($id)
    {
        Orders::destroy($id);

        return redirect()->route(config('quickadmin.route') . '.orders.index');
    }

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Orders::destroy($toDelete);
        } else {
            Orders::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route') . '.orders.index');
    }

    public static function makePDF(Orders $order)
    {
        $pdf = new \FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(40, 10, $order->client->name);
        $pdf->Cell(40, 10, $order->user->name);
        $pdf->Output('F', '/var/www/html/prosperis-2/public/images/orders/pdf/order' . $order->client->id . '.pdf', true);
        $way = '/images/orders/pdf/order' . $order->client->id . '.pdf';
        return $way;
    }

    public function history($id)
    {
        $histories = History::where('order_id', $id)->get();
        return view('admin.orders.history')->with('histories', $histories);
    }

}
