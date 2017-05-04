<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Meta;
use App\Http\Requests\CreateMetaRequest;
use App\Http\Requests\UpdateMetaRequest;
use Illuminate\Http\Request;



class MetaController extends Controller {

	/**
	 * Display a listing of meta
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $meta = Meta::all();

		return view('admin.meta.index', compact('meta'));
	}

	/**
	 * Show the form for creating a new meta
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.meta.create');
	}

	/**
	 * Store a newly created meta in storage.
	 *
     * @param CreateMetaRequest|Request $request
	 */
	public function store(CreateMetaRequest $request)
	{
	    
		Meta::create($request->all());

		return redirect()->route(config('quickadmin.route').'.meta.index');
	}

	/**
	 * Show the form for editing the specified meta.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$meta = Meta::find($id);
	    
	    
		return view('admin.meta.edit', compact('meta'));
	}

	/**
	 * Update the specified meta in storage.
     * @param UpdateMetaRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMetaRequest $request)
	{
		$meta = Meta::findOrFail($id);

        

		$meta->update($request->all());

		return redirect()->route(config('quickadmin.route').'.meta.index');
	}

	/**
	 * Remove the specified meta from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Meta::destroy($id);

		return redirect()->route(config('quickadmin.route').'.meta.index');
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
            Meta::destroy($toDelete);
        } else {
            Meta::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.meta.index');
    }

}
