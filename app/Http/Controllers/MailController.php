<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendEmail($pdf, $way)
    {
        $finallway = '/var/www/html/prosperis-2/public'.$way;
        $GLOBALS['way'] = $finallway;
        $data = ['pdf'=>$pdf];
        Mail::send(['text'=>'mails/client'],$data, function ($message){

            $message->to('shpulka9519@gmail.com', 'Yuliya Berdiy')->subject('New Order');
            $message->from('y.berdiy@gmail.com', 'Yuliya');
            $message->attach($GLOBALS['way']);
        } );
    }
}
