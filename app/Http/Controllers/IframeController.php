<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IframeController extends Controller
{
    public function index()
    {
    	return view('iframe.index');
    }
}
