<?php

namespace App\Http\Controllers\Admin;

use App\Clients;
use App\Http\Controllers\Controller;
use App\Statuses;
use App\TypeOfVisas;
use App\User;
use Redirect;
use Schema;
use App\Orders;
use App\Http\Requests\CreateOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use Illuminate\Http\Request;



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
            'prepayment' => 'integer'
        ]);


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


        $imageName = str_random(30) . '.' .
            $request->file('scan_order_path')->getClientOriginalExtension();

        $request->file('scan_order_path')->move(
            base_path() . '/public/images/orders/', $imageName
        );

        $order->scan_order_path = '/images/orders/'.$imageName;

        $order->payment = $request['payment'];
        $order->prepayment = $request['prepayment'];
        $order->save();

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
            'prepayment' => 'integer'
        ]);

        $orders = Orders::findOrFail($id);


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

}
