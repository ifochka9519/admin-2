<?php

namespace App\Http\Controllers\Admin;

use App\Call;
use App\Http\Controllers\Controller;

class CallsController extends Controller {

	/**
	 * Index page
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index()
    {
        $call = Call::all();
        return view('admin.calls.index')->with(['call'=>$call]);
	}

}