<?php

namespace App\Http\Controllers\Admin;

use App\History;
use App\Http\Controllers\Controller;
use App\News;
use FontLib\TrueType\Collection;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Array_;

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
        $news = new Collection(History::class);
        $histories = History::where('see_it2',0)->where('manager_id',$user->id)->get()->sortByDesc('created_at');
        $news = clone $histories;
        if ($histories != []){
            foreach ($histories as $item){
                $item->see_it2 = 1;
                $item->save();
            }
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