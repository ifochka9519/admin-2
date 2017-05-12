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

    public function see()
    {
        $user = Auth::user();
        $news = News::all();
        foreach ($news as $new){
            if($new->manager_id == $user->id){
                $new->manager_id = 0;
                $new->save();
            }
        }
        return redirect('/admin');
    }
}