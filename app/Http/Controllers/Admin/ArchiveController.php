<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LanguageController;
use App\Orders;

class ArchiveController extends Controller {

	/**
	 * Index page
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index()
    {
        $orders = Orders::where('status_id', '8')->get();
        $words = LanguageController::orders('ru');
		return view('admin.archive.index')->with(['orders'=>$orders, 'words'=>$words]);
	}

}