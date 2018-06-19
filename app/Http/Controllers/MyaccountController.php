<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;


class MyaccountController extends Controller
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


    public function index()
    {

        return redirect()->route('myaccount.home');
    }



    public function home()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);



        return view('site.home')->with('events',$user->events,'posts',$user->posts);
    }
}
