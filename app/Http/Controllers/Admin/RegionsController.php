<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Regions;
use App\Http\Requests\CreateRegionsRequest;
use App\Http\Requests\UpdateRegionsRequest;
use Illuminate\Http\Request;



class RegionsController extends Controller {

	/**
	 * Display a listing of regions
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $regions = Regions::all();

		return view('admin.regions.index', compact('regions'));
	}

	/**
	 * Show the form for creating a new regions
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.regions.create');
	}

	/**
	 * Store a newly created regions in storage.
	 *
     * @param CreateRegionsRequest|Request $request
	 */
	public function store(CreateRegionsRequest $request)
	{
	    
		Regions::create($request->all());

		return redirect()->route(config('quickadmin.route').'.regions.index');
	}

	/**
	 * Show the form for editing the specified regions.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$regions = Regions::find($id);
	    
	    
		return view('admin.regions.edit', compact('regions'));
	}

	/**
	 * Update the specified regions in storage.
     * @param UpdateRegionsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRegionsRequest $request)
	{
		$regions = Regions::findOrFail($id);

        

		$regions->update($request->all());

		return redirect()->route(config('quickadmin.route').'.regions.index');
	}

	/**
	 * Remove the specified regions from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Regions::destroy($id);

		return redirect()->route(config('quickadmin.route').'.regions.index');
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
            Regions::destroy($toDelete);
        } else {
            Regions::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.regions.index');
    }

}
