<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Script;
use App\Http\Requests\CreateScriptRequest;
use App\Http\Requests\UpdateScriptRequest;
use Illuminate\Http\Request;



class ScriptController extends Controller {

	/**
	 * Display a listing of script
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $script = Script::all();

		return view('admin.script.index', compact('script'));
	}

	/**
	 * Show the form for creating a new script
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.script.create');
	}

	/**
	 * Store a newly created script in storage.
	 *
     * @param CreateScriptRequest|Request $request
	 */
	public function store(CreateScriptRequest $request)
	{
	    
		Script::create($request->all());

		return redirect()->route(config('quickadmin.route').'.script.index');
	}

	/**
	 * Show the form for editing the specified script.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$script = Script::find($id);
	    
	    
		return view('admin.script.edit', compact('script'));
	}

	/**
	 * Update the specified script in storage.
     * @param UpdateScriptRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateScriptRequest $request)
	{
		$script = Script::findOrFail($id);

        

		$script->update($request->all());

		return redirect()->route(config('quickadmin.route').'.script.index');
	}

	/**
	 * Remove the specified script from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Script::destroy($id);

		return redirect()->route(config('quickadmin.route').'.script.index');
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
            Script::destroy($toDelete);
        } else {
            Script::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.script.index');
    }

}
