<?php

namespace App\Http\Controllers;



use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Image;
use File;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $auth;

    public function __construct(Guard $auth){
        $this->middleware('auth');
        $this->auth = $auth;
    }





    /**
     * Show the application Profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit()
    {
        $user = $this->auth->user();
        return view('site.partials.profile',compact('user'));
    }




    public function update(Guard $auth, Request $request)
    {
        //dd($request->all()); // pour tester les donner qui entre dans la base de donner
        $user = $this->auth->user();
        $this->validate($request,[
            'username' => "required|string|min:2|max:25|unique:users,username,{$user->id}",
            'name' => "required|string|min:2|max:25",
            'email' => "required|email|max:255|unique:users,email,{$user->id}",
            'avatar' =>"image",
            'avatarcover' =>"image|image|mimes:jpeg,png,jpg,gif,svg|max:4000",
            //"birthday" => "date",
            "body" =>"max:200",
            "sex" => "required|in:Female,Male",
            "color_name" => "required|in:primary,info,rose,success,warning,danger,dark",

        ]);


        $user->update($request->only(
            'email',
            'username',
            'name',
            'country',
            'first_name',
            'last_name',
            'color_name',
            'full_name',
            'cellphone',
            'work',
            'avatar',
            'birthday',
            'avatarcover',
            'sex',
            'body',
            'twlink',
            'instalink',
            'fblink'
        ));


        if ($user->save()){
            //Alert::success('Success ', 'Votre profil a été mise à jour avec succès');
            toastr()->success('<b>The profile has been update  !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
            return redirect(route('myaccount.profile'));
        }else{

            alert()->error('Oops...', 'Quelque chose s\'est mal passé  avec la ceation de l\'utilisateur!');
            return redirect(route('myaccount.profile'));
        }

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

    }
}
