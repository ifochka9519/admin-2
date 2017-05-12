<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(Request $request, $locate)
    {
        app()->setLocale($locate);
        echo trans('language.message');
    }

    public static function  orders($locate)
    {
        app()->setLocale($locate);
        $arr = trans('language.orders');
        return $arr;
    }
    public static function  news($locate)
    {
        app()->setLocale($locate);
        $arr = trans('language.news');
        return $arr;
    }
    public static function  orders_edit($locate)
    {
        app()->setLocale($locate);
        $arr = trans('language.orders_edit');
        return $arr;
    }

    public function ru()
    {
        app()->setLocale('ru');
        return redirect()->back();
    }
    public function pl()
    {
        app()->setLocale('pl');
        return redirect()->back();
    }
    public function en()
    {
        app()->setLocale('en');
        return redirect()->back();
    }
}
