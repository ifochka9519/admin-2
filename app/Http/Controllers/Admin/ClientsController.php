<?php

namespace App\Http\Controllers\Admin;

use App\Addresses;
use App\Cities;
use App\Customers;
use App\Districts;
use App\History;
use App\Http\Controllers\Controller;
use App\Image;
use App\Orders;
use App\Regions;
use App\User;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Schema;
use App\Clients;
use App\Http\Requests\CreateClientsRequest;
use App\Http\Requests\UpdateClientsRequest;
use Illuminate\Http\Request;


class ClientsController extends Controller
{

    /**
     * Display a listing of clients
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if (Auth::user()->role_id == 3) {
            $clients = Clients::where('user_id', Auth::user()->id)->get();
        } else {
            $clients = Clients::all();
        }
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new clients
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $customers = Customers::pluck('name', 'id');

        $managers = User::where('role_id', '3')->pluck('name', 'id');
        $regions = Regions::pluck('name', 'id');
        $districts = Districts::pluck('name', 'id');
        $cities = Cities::pluck('name', 'id');
        $addresses = Addresses::pluck('address', 'id');


        return view('admin.clients.create')->with(['customers' => $customers, 'managers' => $managers, 'regions' => $regions, 'districts' => $districts, 'cities' => $cities, 'addresses' => $addresses]);

    }

    /**
     * Store a newly created clients in storage.
     *
     * @param CreateClientsRequest|Request $request
     */
    public function store(CreateClientsRequest $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'payment' => 'integer',
            'prepayment' => 'integer',
            'passport' => 'required|min:4|max:12|unique:clients',
            'email' => 'required|email|max:255|unique:clients',
        ]);
        $client = Clients::create($request->all());


        for ($i = 1; $i < 6; $i++) {
            if($request->file('scan_passport_path'.$i)!=null){
                $img = new Image();
                $imageName = str_random(30) . '.' .
                    $request->file('scan_passport_path'.$i)->getClientOriginalExtension();
                $request->file('scan_passport_path'.$i)->move(
                    base_path() . '/public/images/users/', $imageName
                );
                $img->path = '/images/users/' . $imageName;
                $img->client_id = $client->id;
                $img->save();
            }
        }


        $client->save();

        $user = User::find($request['user_id']);
        $client->user($user);

        return redirect()->route(config('quickadmin.route') . '.clients.index');
    }

    /**
     * Show the form for editing the specified clients.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $clients = Clients::find($id);
        $regions = Regions::pluck('name', 'id');
        $city = $clients->address->city;
        $district = Districts::where('id', $city->districts_id)->first();
        $region = Regions::where('id', $district->regions_id)->first();


        $order = Orders::where('status_id', '!=', 8)->where('client_id', $id)->first();
        if ($order != null){
            $flag = false;
        }
        else
            $flag = true;



        return view('admin.clients.edit', compact('clients'))->with(['regions' => $regions, 'city' => $city, 'district' => $district, 'region' => $region, 'flag' => $flag]);
    }

    /**
     * Update the specified clients in storage.
     * @param UpdateClientsRequest|Request $request
     *
     * @param  int $id
     */
    public function update($id, UpdateClientsRequest $request)
    {
        $clients = Clients::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:255',
            'payment' => 'integer',
            'prepayment' => 'integer',
            'passport' => 'required|min:4|max:12|unique:clients',
            'email' => 'required|email|max:255|unique:clients',
        ]);


        if (is_integer($request['address_id'])) {
            $clients->address_id = $request['address_id'];
        }

        $clients->payment = $request['payment'];
        $clients->prepayment = $request['prepayment'];
        $clients->passport = $request['passport'];
        $clients->data_of_birthday = $request['data_of_birthday'];
        $clients->phone = $request['phone'];
        $clients->email = $request['email'];

        if ($request->file('scan_passport_path') != null) {


            $imageName = str_random(30) . '.' .
                $request->file('scan_passport_path')->getClientOriginalExtension();

            $request->file('scan_passport_path')->move(
                base_path() . '/public/images/users/', $imageName
            );

            $clients->scan_passport_path = '/images/users/' . $imageName;

        }


        $clients->save();

        return redirect()->route(config('quickadmin.route') . '.clients.index');
    }

    /**
     * Remove the specified clients from storage.
     *
     * @param  int $id
     */
    public function destroy($id)
    {
        Clients::destroy($id);

        return redirect()->route(config('quickadmin.route') . '.clients.index');
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
            Clients::destroy($toDelete);
        } else {
            Clients::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route') . '.clients.index');
    }

    public function history($id)
    {
        $client = Clients::find($id);
        $order = Orders::where('status_id', '!=', 8)->where('client_id', $id)->first();
        $orders = Orders::all()->where('status_id', 8)->where('client_id', $id);
        if ($order != null)
            $histories = History::where('order_id', $order->id)->get();
        else
            $histories = [];

        return view('admin.clients.history')->with(['client' => $client, 'current_order' => $order, 'orders' => $orders, 'histories' => $histories]);
    }

}
