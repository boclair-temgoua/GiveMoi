<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
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
     * Show the application Profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit()
    {
        $user = Auth::user();
        return view('site.partials.profile',compact('user'));
    }




    public function update(Request $request)
    {
        //dd($request->all()); // pour tester les donner qui entre dans la base de donner
        $user = Auth()->user();
        $this->validate($request,[
            'username' => "required|string|min:2|max:25|unique:users,username,{$user->id}",
            'email' => "required|email|max:255|unique:users,email,{$user->id}",
            'avatar' =>"image",
            'avatarcover' =>"image",
            "birthday" =>"date",
            "body" =>"max:200",

        ]);

        if (isset($data['avatar'])) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }
        if (isset($data['avatarcover'])) {
            $user->addMediaFromRequest('avatarcover')->toMediaCollection('cover');
        }

        $user->update($request->only(
            'email',
            'username',
            'lastname',
            'name',
            'work',
            'avatar',
            'birthday',
            'avatarcover',
            'gender',
            'body',
            'twlink',
            'instalink',
            'fblink'
        ));

        if ($request->password_options == 'auto'){

            $length = 10;
            $keyspace = '2y$10$d4gjolCjg/VLPbpbRkNuNOKneeSEoP3dQao6iEHEiY65S31QTAAvW';
            $str= '';
            $max = mb_strlen($keyspace,'8bit') -1;
            for ($i = 0; $i < $length; ++$i){
                $str .= $keyspace[random_int(0,$max)];
            }
            $user->password = Hash::make($str);
        }elseif ($request->password_options == 'manual'){
            $user->password = Hash::make($request->password);

        }

        if ($user->save()){
            Alert::success('Success ', 'Votre profil a été mise à jour avec succès');
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
