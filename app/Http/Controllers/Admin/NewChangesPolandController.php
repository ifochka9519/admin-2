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

    public function see()
    {
        $user = Auth::user();
        $news = News::all();
        foreach ($news as $new1){
            if($new1->poland_id == $user->id){
                $history = new History();
                $new = new News();
                $order = $new1->history->order;
                $history->order_id = $order->id;
                $history->status_old = $order->status->name;
                $history->status_id = 3;
                $order->status_id = 3;
                $order->save();
                $history->status_current = Statuses::find('3')->name;
                $history->status(Statuses::find('3'));
                $history->order($order);
                $history->save();
                $new->poland_id = 0;
                $new->manager_id = $order->client->user_id;
                $new->history_id = $history->id;
                $new->user(User::find($order->client->user_id));
                $new->history($history);
                $new->save();
                $new1->delete();
            }
        }
        return redirect('/admin');
    }
}