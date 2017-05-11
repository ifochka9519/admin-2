<?php

namespace App\Http\Controllers\Admin;

use App\Clients;
use App\History;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Statuses;
use App\TypeOfVisas;
use App\User;
use Illuminate\Support\Facades\App;
use Redirect;
use Schema;
use App\Orders;
use App\Http\Requests\CreateOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use Illuminate\Http\Request;
require ('/var/www/html/prosperis-2/public/fpdf/fpdf.php');


class OrdersController extends Controller {

	/**
	 * Display a listing of orders
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $orders = Orders::all();


		return view('admin.orders.index', compact('orders'));
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
	    return view('admin.orders.create')->with(['clients'=>$clients, 'users'=>$users, 'typeofvisas'=>$typeofvisas,'statuses'=>$statuses]);
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

        $order->scan_order_path = '/images/orders/'.$imageName;

        $order->payment = $request['payment'];
        $order->prepayment = $request['prepayment'];
        $order->save();
        $history->status_id = $request['status_id'];
        $history->status_old = 'новая';
        $history->order_id = $order->id;
        $history->status_current = $status->name;
        $history->status($status);
        $history->order($order);
        $history->save();

		return redirect()->route(config('quickadmin.route').'.orders.index');
	}

	/**
	 * Show the form for editing the specified orders.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$orders = Orders::find($id);
        $statuses = Statuses::pluck('name', 'id');
        $typeofvisas = TypeOfVisas::pluck('name', 'id');
        $clients = Clients::pluck('name', 'id');
        $users = User::where('role_id', 4)->pluck('name', 'id');

        return view('admin.orders.edit')->with(['orders'=>$orders,'clients'=>$clients, 'users'=>$users, 'typeofvisas'=>$typeofvisas,'statuses'=>$statuses]);
	}

	/**
	 * Update the specified orders in storage.
     * @param UpdateOrdersRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateOrdersRequest $request)
    {
        $this->validate($request, [
            'payment' => 'integer',
            'prepayment' => 'integer',
            'client_id' => 'required'
        ]);


        $orders = Orders::findOrFail($id);
if($orders->status_id != $request['status_id']){
    $status = Statuses::find($request['status_id']);
    $history = new History();
    $history->status_id = $request['status_id'];
    $history->order_id = $orders->id;
    $history->status_old = $orders->status->name;
    $history->status_current = $status->name;
    $history->status($status);
    $history->order($orders);
    $history->save();
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



		return redirect()->route(config('quickadmin.route').'.orders.index');
	}

	/**
	 * Remove the specified orders from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Orders::destroy($id);

		return redirect()->route(config('quickadmin.route').'.orders.index');
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

        return redirect()->route(config('quickadmin.route').'.orders.index');
    }

    public static function makePDF(Orders $order)
    {


        $pdf = new \FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(40,10,$order->client->name);
        $pdf->Cell(40,10,$order->user->name);
       // $result = $pdf->Output('F','/public/images/orders/pdf/order.pdf',true);
        $pdf->Output('F','/var/www/html/prosperis-2/public/images/orders/pdf/order'.$order->client->id.'.pdf',true);
        $way = '/images/orders/pdf/order'.$order->client->id.'.pdf';
        MailController::sendEmail($pdf, $way);
        return $way;
       // dump($pdf->Output());
       /* $pdf->AddPage();
       $pdf->SetFont('Times','B',16);
       $pdf->Cell(40,10,'Hello World!');
        $pdf->Output();*/
    }

    public function history($id)
    {
        $histories = History::where('order_id', $id)->get();
        return view('admin.orders.history')->with('histories', $histories);
    }

}
