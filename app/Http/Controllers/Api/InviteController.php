<?php

namespace App\Http\Controllers\Api;

use App\Mail\InviteCreated;
use App\Model\user\invite;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{




    public function invite()
    {
        return view('site.user.invite.invite');
    }

    public function process(Request $request)
    {
        // validate the incoming request data

        do {
            //generate a random string using Laravel's str_random helper
            $token = str_random();
        } //check if the token already exists and if it does, try again
        while (Invite::where('token', $token)->first());

        //create a new invite record
        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token
        ]);
       // dd($invite);

        // send the email
        Mail::to($request->get('email'))->send(new InviteCreated($invite));

        // redirect back where we came from
        return redirect()
            ->back();
    }

    public function accept($token)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        // create the user with the details from the invite
        User::create(['email' => $invite->email]);

        // delete the invite so it can't be used again
        $invite->delete();

        // here you would probably log the user in and show them the dashboard, but we'll just prove it worked



        alert()->success('Good job invite accepted!','PLease add your username!')->persistent('Close Me!');
        return redirect(route('account.add_info'))->with('success','Event update with success!');
    }

    public function addinfo(Request $request)
    {

        $user = Auth()->user();
        $this->validate($request,[
            'username' => "required|string|min:2|max:25|unique:users,username,{$user->id}",
            'email' => "required|email|max:255|unique:users,email,{$user->id}",


        ]);
    }
    public function edit()
    {

        $user = Auth::user();
        return view('site.user.invite.index',compact('user'));
    }



}
