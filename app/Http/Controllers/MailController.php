<?php

namespace App\Http\Controllers;

use App\History;
use App\Reminder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public $time = 0;

    public static function sendEmail()
    {
        // $finallway = '/var/www/html/prosperis-2/public'.$way;

        $current_time = Carbon::now();
        $user = Auth::user();
        $reminders = $user->reminders;

        if (count(last($reminders)) != 0) {
           // dump(last(last($reminders)));
            if (((strtotime(last(last($reminders))->created_at) - strtotime($current_time)) / 60) > 30) {
                $data = [];
                Mail::send(['text' => 'mails/client'], $data, function ($message) {

                    $message->to('shpulka9519@gmail.com', 'Yuliya Berdiy')->subject('New Order');
                    $message->from('y.berdiy@gmail.com', 'Yuliya');
                    //$message->attach($GLOBALS['way']);
                });
                $reminder = new Reminder();
                $reminder->user_id = $user->id;
                $reminder->user(Auth::user());
                $reminder->save();
            }
        }
        else{
            $data = [];
            Mail::send(['text' => 'mails/client'], $data, function ($message) {

                $message->to('shpulka9519@gmail.com', 'Yuliya Berdiy')->subject('New Order');
                $message->from('y.berdiy@gmail.com', 'Yuliya');
                //$message->attach($GLOBALS['way']);
            });
            $reminder = new Reminder();
            $reminder->user_id = $user->id;
            $reminder->user($user);
            $reminder->save();
        }
    }

    public static function updateStatus($order_id, $status_old, $status_current, $created_at)
    {

        $data = ['order_id' => $order_id, 'status_old' => $status_old, 'status_current' => $status_current, 'created_at' => $created_at];
        Mail::send(['text' => 'mails/update'], $data, function ($message) {

            $message->to('shpulka9519@gmail.com', 'Yuliya Berdiy')->subject('New Order');
            $message->from('y.berdiy@gmail.com', 'Yuliya');
        });
    }

    public function some()
    {
        $data = ['order_id' => 'fff'];
        Mail::send(['text' => 'mails/client'], $data, function ($message) {

            $message->to('shpulka9519@gmail.com', 'Yuliya Berdiy')->subject('Some')->delay('50');
            $message->from('y.berdiy@gmail.com', 'Yuliya');
        });
    }


    public static function call($name,$telephone)
    {
        $data = ['name' => $name, 'telephone' => $telephone];
        Mail::send(['text' => 'mails/call'], $data, function ($message) {

            $message->to('shpulka9519@gmail.com', 'Yuliya Berdiy')->subject('New Call');
            $message->from('y.berdiy@gmail.com', 'Yuliya');
        });
    }

}
