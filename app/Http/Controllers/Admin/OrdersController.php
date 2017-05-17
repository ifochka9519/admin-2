<?php

namespace App\Http\Controllers\Admin;

use App\Clients;
use App\Corridor;
use App\History;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MailController;
use App\News;
use App\Statuses;
use App\TypeOfVisas;
use App\User;
use Carbon\Carbon;
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
            $orders = Auth::user()->orders->where('status_id','!=', 8);
            $words = LanguageController::orders('pl');

        }elseif(Auth::user()->role_id == 3){
            $orders = Orders::where('manager_id', Auth::user()->id)->where('status_id','!=', 8)->get();
            $words = LanguageController::orders('ru');

        }else{
            $orders = Orders::all()->where('status_id','!=', 8);
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
            'client_id' => 'required|unique:orders,client_id,NULL,id,status_id,1,status_id,2,status_id,3,status_id,4,status_id,5,status_id,6,status_id,7'
        ]);

        $history = new History();
        $order = new Orders();
        $news = new News();

        $order->parent_1 = $request['parent_1'];
        $order->parent_2 = $request['parent_2'];
        $order->home = $request['home'];
        $order->data_start = $request['data_start'];
        $order->data_finish = $request['data_finish'];
        $order->data_output = $request['data_output'];
        $order->lenght1 = $request['lenght1'];
        $order->lenght2 = $request['lenght2'];
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

        //$order->pdf = OrdersController::makePDF($order);

    /*    $imageName = str_random(30) . '.' .
            $request->file('scan_order_path')->getClientOriginalExtension();

        $request->file('scan_order_path')->move(
            base_path() . '/public/images/orders/', $imageName
        );

        $order->scan_order_path = '/images/orders/' . $imageName;*/

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
        $history->user_id = $request['user_id'];
        $history->user_name = Auth::user()->name;
        $history->manager_id = $client->user_id;
        $history->save();
        $news->poland_id = $user->id;
        $news->manager_id = $client->user_id;
        $news->history_id = $history->id;
        $news->user(User::find($client->user_id));
        $news->history($history);
        if($request['status_id'] == 1){
            MailController::sendEmail($order->pdf);

        }
        if($request['status_id'] != 6){
            $news->poland_id = $request['user_id'];
        }
        $news->save();


        if($request['data_finish1']!= $request['data_start1']){
            $corridor = new Corridor();
            $corridor->start = $request['data_start1'];
            $corridor->end = $request['data_finish1'];
            $corridor->order_id = $order->id;
            $corridor->save();
            $corridor->order($order);
        }

        if($request['data_finish2']!= $request['data_start2']){
            $corridor = new Corridor();
            $corridor->start = $request['data_start2'];
            $corridor->end = $request['data_finish2'];
            $corridor->order_id = $order->id;
            $corridor->save();
            $corridor->order($order);
        }


        if($request['data_finish3']!= $request['data_start3']){
            $corridor = new Corridor();
            $corridor->start = $request['data_start3'];
            $corridor->end = $request['data_finish3'];
            $corridor->order_id = $order->id;
            $corridor->save();
            $corridor->order($order);
        }


        if($request['data_finish4']!= $request['data_start4']){
            $corridor = new Corridor();
            $corridor->start = $request['data_start4'];
            $corridor->end = $request['data_finish4'];
            $corridor->order_id = $order->id;
            $corridor->save();
            $corridor->order($order);
        }



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
           /* if($request['status_id'] == 2){
                MailController::sendEmail($orders->pdf);

            }*/


            if($request['status_id'] != 8){
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
            $history->user_id = $orders->user_id;
            $history->user_name = Auth::user()->name;
            $history->manager_id = $orders->client->user_id;
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

/*    public static function makePDF(Orders $order)
    {
        $pdf = new \FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(40, 10, $order->client->name);
        $pdf->Cell(40, 10, $order->user->name);
        $pdf->Output('F', '/var/www/html/prosperis-2/public/images/orders/pdf/order' . $order->client->id . '.pdf', true);
        $way = '/images/orders/pdf/order' . $order->client->id . '.pdf';
        return $way;
    }*/

    public function history($id)
    {
        $histories = History::where('order_id', $id)->get();
        return view('admin.orders.history')->with('histories', $histories);
    }


    public function timer()
    {
        $user = Auth::user();
        $orders2 = [];
        if ($user->role_id == 3) {
            $orders = Orders::where('manager_id', $user->id)->where('lenght1', '1')->where('status_id','!=', '8')->get();
            foreach ($orders as $order){
                $date = strtotime($order->created_at);
                $current_time = Carbon::now();
                $current_time = strtotime($current_time);
                if(($current_time - $date)/86400 > 45  ){
                    $orders2 = $order->client->name;
                }

            }
        }
        return $orders2;


    }
}
