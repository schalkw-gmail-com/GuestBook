<?php

namespace App\Http\Controllers;
use App\Message;
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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->paginate(3);

        return view('home')->with('messages', $messages);
    }

    public function admin(){
        return "Admin Role?";
    }
}
