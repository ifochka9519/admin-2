<?php

namespace App\Http\Controllers\Admin;

use App\Addresses;
use App\Cities;
use App\Customers;
use App\Districts;
use App\Http\Controllers\Controller;
use App\Regions;
use App\User;
use Redirect;
use Schema;
use App\Clients;
use App\Http\Requests\CreateClientsRequest;
use App\Http\Requests\UpdateClientsRequest;
use Illuminate\Http\Request;



class ClientsController extends Controller {

	/**
	 * Display a listing of clients
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $clients = Clients::all();

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
        $regions =  Regions::pluck('name', 'id');
        $districts = Districts::pluck('name', 'id');
        $cities = Cities::pluck('name', 'id');
        $addresses = Addresses::pluck('address', 'id');


        return view('admin.clients.create')->with(['customers'=> $customers, 'managers'=>$managers, 'regions'=>$regions, 'districts'=>$districts, 'cities'=>$cities, 'addresses'=>$addresses]);

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
            'phone' => 'numeric',
            'passport' => 'required|min:4|max:12|regex:/[A-Z0-9]/|unique:clients',
            'email' => 'required|email|max:255|unique:clients',
        ]);
        $client = Clients::create($request->all());



        $imageName = str_random(30) . '.' .
            $request->file('scan_passport_path')->getClientOriginalExtension();

        $request->file('scan_passport_path')->move(
            base_path() . '/public/images/users/', $imageName
        );
        $client->scan_passport_path = '/images/users/'.$imageName;
        $client->save();

        /*$file = $request->file('scan_passport_path');
        $file_name = str_random(30) . '.jpg';
        $file->move(base_path() . '/assets/files/');
        $client->scan_passport_path = '/images/users/' . $file_name;
	    */


		$user = User::find($request['user_id']);
		$client->user($user);

		return redirect()->route(config('quickadmin.route').'.clients.index');
	}

	/**
	 * Show the form for editing the specified clients.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$clients = Clients::find($id);
        $regions =  Regions::pluck('name', 'id');
	    
	    
		return view('admin.clients.edit', compact('clients'))->with(['regions'=>$regions]);
	}

	/**
	 * Update the specified clients in storage.
     * @param UpdateClientsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateClientsRequest $request)
	{
		$clients = Clients::findOrFail($id);

        

		$clients->update($request->all());

		return redirect()->route(config('quickadmin.route').'.clients.index');
	}

	/**
	 * Remove the specified clients from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Clients::destroy($id);

		return redirect()->route(config('quickadmin.route').'.clients.index');
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

        return redirect()->route(config('quickadmin.route').'.clients.index');
    }

}
