<?php

namespace App\Http\Controllers\Admin;

use App\History;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LanguageController;
use App\News;
use App\Statuses;
use App\User;
use FontLib\TrueType\Collection;
use Illuminate\Support\Facades\Auth;

class NewChangesPolandController extends Controller
{

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
        $histories = History::where('see_it',0)->where('user_id',$user->id)->get()->sortByDesc('created_at');
        $news = clone $histories;
        if ($histories != []){
            foreach ($histories as $item){
                $item->see_it = 1;
                $item->save();
            }
        }

        if ($user->role_id == 4) {
            $words = LanguageController::news('pl');
        }


        return view('admin.newchangespoland.index')->with(['news'=>$news, 'words'=>$words]);

    }


    public function timer()
    {
        $user = Auth::user();
        if ($user->role_id == 4)
        $histories = History::where('see_it',0)->where('user_id',$user->id)->get()->sortByDesc('created_at');
        if ($user->role_id == 3)
            $histories = History::where('see_it2',0)->where('manager_id',$user->id)->get()->sortByDesc('created_at');
        return $histories;


    }
}