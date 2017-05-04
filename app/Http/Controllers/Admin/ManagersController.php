<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Managers;
use App\Http\Requests\CreateManagersRequest;
use App\Http\Requests\UpdateManagersRequest;
use Illuminate\Http\Request;



class ManagersController extends Controller {

	/**
	 * Display a listing of managers
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $managers = Managers::all();

		return view('admin.managers.index', compact('managers'));
	}

	/**
	 * Show the form for creating a new managers
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.managers.create');
	}

	/**
	 * Store a newly created managers in storage.
	 *
     * @param CreateManagersRequest|Request $request
	 */
	public function store(CreateManagersRequest $request)
	{
	    
		Managers::create($request->all());

		return redirect()->route(config('quickadmin.route').'.managers.index');
	}

	/**
	 * Show the form for editing the specified managers.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$managers = Managers::find($id);
	    
	    
		return view('admin.managers.edit', compact('managers'));
	}

	/**
	 * Update the specified managers in storage.
     * @param UpdateManagersRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateManagersRequest $request)
	{
		$managers = Managers::findOrFail($id);

        

		$managers->update($request->all());

		return redirect()->route(config('quickadmin.route').'.managers.index');
	}

	/**
	 * Remove the specified managers from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Managers::destroy($id);

		return redirect()->route(config('quickadmin.route').'.managers.index');
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
            Managers::destroy($toDelete);
        } else {
            Managers::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.managers.index');
    }

}
