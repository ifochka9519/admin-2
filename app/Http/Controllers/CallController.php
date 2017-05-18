<?php

namespace App\Http\Controllers;

use App\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'telephone' => 'required'
        ]);
        $call = new Call();
        $call->name = $request['name'];
        $call->telephone = $request['telephone'];
        $call->save();

        MailController::call($call->name, $call->telephone);
    }

    public function index()
    {

    }
}
