<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatController extends Controller
{
    //For the statistics part of the System

    public function index()
    {
    	return view('stats.index');
    }
}
