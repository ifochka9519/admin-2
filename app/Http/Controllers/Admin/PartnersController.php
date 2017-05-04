<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Partners;
use App\Http\Requests\CreatePartnersRequest;
use App\Http\Requests\UpdatePartnersRequest;
use Illuminate\Http\Request;



class PartnersController extends Controller {

	/**
	 * Display a listing of partners
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $partners = Partners::all();

		return view('admin.partners.index', compact('partners'));
	}

	/**
	 * Show the form for creating a new partners
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.partners.create');
	}

	/**
	 * Store a newly created partners in storage.
	 *
     * @param CreatePartnersRequest|Request $request
	 */
	public function store(CreatePartnersRequest $request)
	{
	    
		Partners::create($request->all());

		return redirect()->route(config('quickadmin.route').'.partners.index');
	}

	/**
	 * Show the form for editing the specified partners.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$partners = Partners::find($id);
	    
	    
		return view('admin.partners.edit', compact('partners'));
	}

	/**
	 * Update the specified partners in storage.
     * @param UpdatePartnersRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePartnersRequest $request)
	{
		$partners = Partners::findOrFail($id);

        

		$partners->update($request->all());

		return redirect()->route(config('quickadmin.route').'.partners.index');
	}

	/**
	 * Remove the specified partners from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Partners::destroy($id);

		return redirect()->route(config('quickadmin.route').'.partners.index');
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
            Partners::destroy($toDelete);
        } else {
            Partners::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.partners.index');
    }

}
