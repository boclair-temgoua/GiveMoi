<?php

namespace App\Http\Controllers;


use App\Model\user\article;
use App\Model\user\event;
use App\Model\user\myaccount;
use App\Model\user\tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class MyaccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => [
            'viewProfile',
            'show',
            'viewfollowings',
            'viewfollowers',

        ]]);
    }


    public function index()
    {

        return redirect()->route('myaccount.home');
    }

 // public function usersfollow()
 // {

 //    $users = User::firstOrFail()->paginate(50);
 //    return view('site.user.alluser',compact('users'));
 // }


    public function usersfollow()
    {
        $users = User::paginate(50);
        if(request()->ajax()){


            $view = view('site.user._alluser',['users' => $users]);
            return Response()->json([

                'status' => 'ok',
                'listing' => $view->render(),
            ]);

            //(View::make('site.user.page', array('users' => $users))->render());
        }

        return View::make('site.user.alluser', array('users' => $users));
    }







    public function viewfollowers($username) {

        $user = User::where('username', $username)->firstOrFail();

        return view('site.user.partials.follower', [
            'user' => $user,
            'followers' => $user->followers,

        ]);
    }
    public function viewfollowings($username) {

        $user = User::where('username', $username)->orderBy('id','DESC')->firstOrFail();
        return view('site.user.partials.following', [
            'user' => $user,
            'followings' => $user->followings,

        ]);


    }










    public function toggle(Request $request)
    {

        $user = User::find($request->user_id);
        $data= auth()->user()->toggleFollow($user);
        return response()->json(['success'=>$data]);
    }
















    public function home()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);


        return view('site.home', [

            'events'=> $user->events,
            'articles'=> $user->articles,

        ]);
    }

    // View Profile
    public function viewProfile($username) {

        if($username) {

            $user = User::where('username', $username)->firstOrFail();
        } else {
            $user = User::find(Auth::user()->id);
        }

        return view('site.user.account', [

            'user' => $user,
            'events' => $user->events,
            'articles' => $user->articles,


        ]);


    }





    // end

}
