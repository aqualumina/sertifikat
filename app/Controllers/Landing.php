<?php

namespace App\Controllers;

class Landing extends BaseController
{
    public function index()
    {
        $data=[
            'title'=> "Landing"
        ];
        return view('landing');
    }
}