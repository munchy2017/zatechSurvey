<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $questionnaires=auth()->user()->questionnaires;
        return view('home',compact('questionnaires'));
    }
}
