<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subrek = DB::table('push_subscriptions')->where('subscribable_id', Auth::id())->first();
        if($subrek == NULL) {
            $notif = "false";
        } else {
            $notif = "true"; 
        }
        return view('home', compact('notif'));
    }
}
