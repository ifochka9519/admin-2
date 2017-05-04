<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Addresses;
use App\Http\Requests\CreateAddressesRequest;
use App\Http\Requests\UpdateAddressesRequest;
use Illuminate\Http\Request;



class AddressesController extends Controller {

	/**
	 * Display a listing of addresses
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $addresses = Addresses::all();

		return view('admin.addresses.index', compact('addresses'));
	}

	/**
	 * Show the form for creating a new addresses
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.addresses.create');
	}

	/**
	 * Store a newly created addresses in storage.
	 *
     * @param CreateAddressesRequest|Request $request
	 */
	public function store(CreateAddressesRequest $request)
	{
	    
		Addresses::create($request->all());

		return redirect()->route(config('quickadmin.route').'.addresses.index');
	}

	/**
	 * Show the form for editing the specified addresses.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$addresses = Addresses::find($id);
	    
	    
		return view('admin.addresses.edit', compact('addresses'));
	}

	/**
	 * Update the specified addresses in storage.
     * @param UpdateAddressesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAddressesRequest $request)
	{
		$addresses = Addresses::findOrFail($id);

        

		$addresses->update($request->all());

		return redirect()->route(config('quickadmin.route').'.addresses.index');
	}

	/**
	 * Remove the specified addresses from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Addresses::destroy($id);

		return redirect()->route(config('quickadmin.route').'.addresses.index');
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
            Addresses::destroy($toDelete);
        } else {
            Addresses::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.addresses.index');
    }

}
