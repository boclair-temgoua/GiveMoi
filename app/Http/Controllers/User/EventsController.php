<?php

namespace App\Http\Controllers\User;

use App\Model\user\category;
use App\Model\user\event;
use App\Model\user\like;
use App\Model\user\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{





    public function index()
    {
        $events = Event::where('status',1)->orderBy('created_at','DESC')->paginate(12);

        return view('site.event.index',compact('events'));
    }









    public function ajaxRequest(Request $request){


        $event = Event::find($request->id);

        $response = auth()->user()->toggleLike($event);


        return response()->json(['success'=>$response]);

    }










    public function event(event $event)
    {

        return view('site.event.show',compact('event','comments'));
    }



    public function tag(tag $tag)
    {
        $events = $tag->events();
        return view('site.event.index',compact('events'));
    }

    public function category(category $category)
    {

        //return $category->events();

        $events = $category->events();
        return view('site.event.index',compact('events'));

    }


}
