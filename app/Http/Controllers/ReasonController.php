<?php

namespace App\Http\Controllers;

use App\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    public function addNewReason(Request $request)
    {
        $reason = new Reason();
        $reason->order_id = $request['order'];
        $reason->text = $request['text'];
        $reason->save();
    }
}
