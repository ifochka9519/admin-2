<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendEmail($way)
    {
        $finallway = '/var/www/html/prosperis-2/public'.$way;
        $GLOBALS['way'] = $finallway;
        $data = [];
        Mail::send(['text'=>'mails/client'],$data, function ($message){

            $message->to('shpulka9519@gmail.com', 'Yuliya Berdiy')->subject('New Order');
            $message->from('y.berdiy@gmail.com', 'Yuliya');
            $message->attach($GLOBALS['way']);
        } );
    }

    public static function updateStatus($order_id,$status_old,$status_current,$created_at)
    {

        $data = ['order_id'=>$order_id, 'status_old'=>$status_old,'status_current'=>$status_current, 'created_at'=>$created_at];
        Mail::send(['text'=>'mails/update'],$data, function ($message){

            $message->to('shpulka9519@gmail.com', 'Yuliya Berdiy')->subject('New Order');
            $message->from('y.berdiy@gmail.com', 'Yuliya');
        } );
    }


}
