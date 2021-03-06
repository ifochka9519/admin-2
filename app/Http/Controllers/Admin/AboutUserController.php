<?php

namespace App\Http\Controllers\Admin;

use App\History;
use App\Http\Controllers\Controller;
use App\News;
use App\User;
use Illuminate\Support\Facades\Auth;

class AboutUserController extends Controller {

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

		return view('admin.aboutuser.index')->with('news',$news);
	}

}