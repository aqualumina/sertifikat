<?php

namespace App\Controllers;

class Acara extends BaseController
{
    public function index()
    {
        $data=[
            'title'=> "Beranda"
        ];
        return view('acara/index');
    }

}
