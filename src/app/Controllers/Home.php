<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('test');
    }

    public function index2(): string
    {
        return "Hello World!";
    }
}
