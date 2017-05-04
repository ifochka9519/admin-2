<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Title;
use App\Http\Requests\CreateTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use Illuminate\Http\Request;



class TitleController extends Controller {

	/**
	 * Display a listing of title
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $title = Title::all();

		return view('admin.title.index', compact('title'));
	}

	/**
	 * Show the form for creating a new title
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.title.create');
	}

	/**
	 * Store a newly created title in storage.
	 *
     * @param CreateTitleRequest|Request $request
	 */
	public function store(CreateTitleRequest $request)
	{
	    
		Title::create($request->all());

		return redirect()->route(config('quickadmin.route').'.title.index');
	}

	/**
	 * Show the form for editing the specified title.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$title = Title::find($id);
	    
	    
		return view('admin.title.edit', compact('title'));
	}

	/**
	 * Update the specified title in storage.
     * @param UpdateTitleRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTitleRequest $request)
	{
		$title = Title::findOrFail($id);

        

		$title->update($request->all());

		return redirect()->route(config('quickadmin.route').'.title.index');
	}

	/**
	 * Remove the specified title from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Title::destroy($id);

		return redirect()->route(config('quickadmin.route').'.title.index');
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
            Title::destroy($toDelete);
        } else {
            Title::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.title.index');
    }

}
