<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{



    public function index () {


        $users = User::select('name','id')->where('id','!=', Auth::user()->id)->get();
        return view('site.chat.index',compact('users'));
    }


    public function show (User $user)
    {

        $users = User::select('name','id')->where('id','!=', Auth::user()->id)->get();
        return view('site.chat.index.show',compact('users','user'));

    }


    //public function show (User $user) {
    //    $me = $this->auth->user();
    //    $messages = $this->r->getMessagesFor($me->id, $user->id)->paginate(50);
    //    $unread = $this->r->unreadCount($me->id);
    //    if (isset($unread[$user->id])) {
    //        $this->r->readAllFrom($user->id, $me->id);
    //        unset($unread[$user->id]);
    //    }
    //    return view('site.chat.index.show', [
    //        'users' => $this->r->getConversations($me->id),
    //        'user' => $user,
    //        'messages' => $messages,
    //        'unread'=> $unread
    //    ]);
    //}
}
