<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data=[
            'title'=> "landing"
        ];
        return view('landing');
    }

    public function beranda()
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
