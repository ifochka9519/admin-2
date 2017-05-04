<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Polands;
use App\Http\Requests\CreatePolandsRequest;
use App\Http\Requests\UpdatePolandsRequest;
use Illuminate\Http\Request;



class PolandsController extends Controller {

	/**
	 * Display a listing of polands
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $polands = Polands::all();

		return view('admin.polands.index', compact('polands'));
	}

	/**
	 * Show the form for creating a new polands
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.polands.create');
	}

	/**
	 * Store a newly created polands in storage.
	 *
     * @param CreatePolandsRequest|Request $request
	 */
	public function store(CreatePolandsRequest $request)
	{
	    
		Polands::create($request->all());

		return redirect()->route(config('quickadmin.route').'.polands.index');
	}

	/**
	 * Show the form for editing the specified polands.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$polands = Polands::find($id);
	    
	    
		return view('admin.polands.edit', compact('polands'));
	}

	/**
	 * Update the specified polands in storage.
     * @param UpdatePolandsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePolandsRequest $request)
	{
		$polands = Polands::findOrFail($id);

        

		$polands->update($request->all());

		return redirect()->route(config('quickadmin.route').'.polands.index');
	}

	/**
	 * Remove the specified polands from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Polands::destroy($id);

		return redirect()->route(config('quickadmin.route').'.polands.index');
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
            Polands::destroy($toDelete);
        } else {
            Polands::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.polands.index');
    }

}
