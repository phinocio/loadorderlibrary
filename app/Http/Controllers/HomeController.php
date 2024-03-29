<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $loadOrders = '';

        if (\Auth::check()) {
            $loadOrders = \App\Models\LoadOrder::where('user_id', \Auth::user()->id)->with(['game', 'author:id,name,is_verified'])->orderBy('updated_at', 'desc')->get();
        }

        return view('home')
            ->with('loadOrders', $loadOrders);
    }
}
