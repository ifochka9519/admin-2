<?php

namespace App\Http\Controllers;

use App\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|text',
            'telephone' => 'required|number'
        ]);
        $call = new Call();
        $call->name = $request['name'];
        $call->telephone = $request['telephone'];
        $call->save();
    }

    public function index()
    {
        $call = Call::all();
        return $call;
    }
}
