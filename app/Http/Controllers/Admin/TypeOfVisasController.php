<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\TypeOfVisas;
use App\Http\Requests\CreateTypeOfVisasRequest;
use App\Http\Requests\UpdateTypeOfVisasRequest;
use Illuminate\Http\Request;



class TypeOfVisasController extends Controller {

	/**
	 * Display a listing of typeofvisas
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $typeofvisas = TypeOfVisas::all();

		return view('admin.typeofvisas.index', compact('typeofvisas'));
	}

	/**
	 * Show the form for creating a new typeofvisas
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.typeofvisas.create');
	}

	/**
	 * Store a newly created typeofvisas in storage.
	 *
     * @param CreateTypeOfVisasRequest|Request $request
	 */
	public function store(CreateTypeOfVisasRequest $request)
	{
	    
		TypeOfVisas::create($request->all());

		return redirect()->route(config('quickadmin.route').'.typeofvisas.index');
	}

	/**
	 * Show the form for editing the specified typeofvisas.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$typeofvisas = TypeOfVisas::find($id);
	    
	    
		return view('admin.typeofvisas.edit', compact('typeofvisas'));
	}

	/**
	 * Update the specified typeofvisas in storage.
     * @param UpdateTypeOfVisasRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTypeOfVisasRequest $request)
	{
		$typeofvisas = TypeOfVisas::findOrFail($id);

        

		$typeofvisas->update($request->all());

		return redirect()->route(config('quickadmin.route').'.typeofvisas.index');
	}

	/**
	 * Remove the specified typeofvisas from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		TypeOfVisas::destroy($id);

		return redirect()->route(config('quickadmin.route').'.typeofvisas.index');
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
            TypeOfVisas::destroy($toDelete);
        } else {
            TypeOfVisas::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.typeofvisas.index');
    }

}
