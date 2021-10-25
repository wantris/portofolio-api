<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        phpinfo();
        // return function_exists('curl_version');
        // return view('home');
    }
}
