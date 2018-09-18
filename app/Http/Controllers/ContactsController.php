<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{


    public function get()
    {
        $contacts = User::all();
        //$contacts = User::select()->all()->where('id','!=', Auth::user()->id)->get();
        return response()->json($contacts);
    }
}
