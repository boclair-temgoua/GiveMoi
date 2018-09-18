<?php

namespace App\Http\Controllers\Admin\Account;

use App\Model\admin\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();
        return view('admin.account.profile',compact('admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view("admin.account.profile")->withUser($admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $admin = Auth::user();
        return view('admin.account.account',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd(\request()->all()); // pour tester les donner qui entre dans la base de donner
        $admin = Auth::user();
        $this->validate($request,[
            'username' => "required|string|min:2|max:25|unique:admins,username,{$admin->id}",
            'email' => "required|email|max:255|unique:admins,email,{$admin->id}",
            "body" =>"max:200",
            "color_name" => "required|in:primary,info,rose,success,warning,danger,dark",
            'avatar' =>"image",
        ]);

        $admin->update($request->all());

        toastr()->success('<b>The profile has been update  !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();
    }

}
