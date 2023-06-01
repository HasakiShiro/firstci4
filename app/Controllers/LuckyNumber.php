<?php

namespace App\Controllers;

class LuckyNumber extends BaseController
{
    public function index()
    {
        $data['luckyNumber'] = rand(222, 456);

        return view('tuto04/lucky_number', $data);
    }
}