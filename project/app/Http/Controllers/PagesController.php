<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function results(){
        return view('pages.results');
    }
    public function upcoming(){
        return view('pages.upcoming');
    }
}
