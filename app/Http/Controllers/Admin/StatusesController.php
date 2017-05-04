<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Statuses;
use App\Http\Requests\CreateStatusesRequest;
use App\Http\Requests\UpdateStatusesRequest;
use Illuminate\Http\Request;



class StatusesController extends Controller {

	/**
	 * Display a listing of statuses
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $statuses = Statuses::all();

		return view('admin.statuses.index', compact('statuses'));
	}

	/**
	 * Show the form for creating a new statuses
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.statuses.create');
	}

	/**
	 * Store a newly created statuses in storage.
	 *
     * @param CreateStatusesRequest|Request $request
	 */
	public function store(CreateStatusesRequest $request)
	{
	    
		Statuses::create($request->all());

		return redirect()->route(config('quickadmin.route').'.statuses.index');
	}

	/**
	 * Show the form for editing the specified statuses.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$statuses = Statuses::find($id);
	    
	    
		return view('admin.statuses.edit', compact('statuses'));
	}

	/**
	 * Update the specified statuses in storage.
     * @param UpdateStatusesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStatusesRequest $request)
	{
		$statuses = Statuses::findOrFail($id);

        

		$statuses->update($request->all());

		return redirect()->route(config('quickadmin.route').'.statuses.index');
	}

	/**
	 * Remove the specified statuses from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Statuses::destroy($id);

		return redirect()->route(config('quickadmin.route').'.statuses.index');
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
            Statuses::destroy($toDelete);
        } else {
            Statuses::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.statuses.index');
    }

}
