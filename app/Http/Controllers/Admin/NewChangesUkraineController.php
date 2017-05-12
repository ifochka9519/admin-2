<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Auth;

class NewChangesUkraineController extends Controller {

	/**
	 * Index page
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index()
    {

        $user = Auth::user();
        $news = [];
        if($user->role_id == 3){
            $news = News::all()->where('manager_id',$user->id)->sortByDesc('created_at');
        }
		return view('admin.newchangesukraine.index')->with('news',$news);
	}

}