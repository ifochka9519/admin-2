<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Customers;
use App\Http\Requests\CreateCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;
use Illuminate\Http\Request;



class CustomersController extends Controller {

	/**
	 * Display a listing of customers
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $customers = Customers::all();

		return view('admin.customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new customers
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.customers.create');
	}

	/**
	 * Store a newly created customers in storage.
	 *
     * @param CreateCustomersRequest|Request $request
	 */
	public function store(CreateCustomersRequest $request)
	{
	    
		Customers::create($request->all());

		return redirect()->route(config('quickadmin.route').'.customers.index');
	}

	/**
	 * Show the form for editing the specified customers.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$customers = Customers::find($id);
	    
	    
		return view('admin.customers.edit', compact('customers'));
	}

	/**
	 * Update the specified customers in storage.
     * @param UpdateCustomersRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCustomersRequest $request)
	{
		$customers = Customers::findOrFail($id);

        

		$customers->update($request->all());

		return redirect()->route(config('quickadmin.route').'.customers.index');
	}

	/**
	 * Remove the specified customers from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Customers::destroy($id);

		return redirect()->route(config('quickadmin.route').'.customers.index');
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
            Customers::destroy($toDelete);
        } else {
            Customers::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.customers.index');
    }

}
