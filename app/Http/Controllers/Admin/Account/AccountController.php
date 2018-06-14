<?php

namespace App\Http\Controllers\Admin\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.partials.administrator.account',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          //dd(\request()->all()); // pour tester les donner qui entre dans la base de donner
        $admin = Auth::user();
        $this->validate($request,[
            'username' => "required|string|min:2|max:25|unique:admins,username,{$admin->id}",
            'avatar' =>"image",
            'avatar_cover' =>"image",
            "birthday" =>"date",
            "body" =>"string|min:2|max:160",
        ]);

        if (isset($data['avatar'])) {
            $admin->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }
        $admin->update($request->only(
            'email',
            'username',
            'name',
            'avatar'

        ));

        Alert::success('Success ', 'Votre profil a été mise à jour avec succès');
        return redirect(route('admin.account'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
