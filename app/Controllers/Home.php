<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data=[
            'title'=> "Beranda"
        ];
        return view('beranda');
    }

    public function login()
    {
        $data=[
            'title'=> "Beranda"
        ];
        return view('auth/login');
    }
}
