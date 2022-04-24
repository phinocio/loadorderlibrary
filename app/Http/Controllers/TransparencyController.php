<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransparencyController extends Controller
{
    public function index() {
		return view('transparency');
	}
}
