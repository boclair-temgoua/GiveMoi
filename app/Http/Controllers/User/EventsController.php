<?php

namespace App\Http\Controllers\User;

use App\Model\user\category;
use App\Model\user\event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index()
    {


        $events = Event::where('status',1)->orderBy('created_at','DESC')->paginate(12);

        return view('site.event.index',compact('events'));
    }



    public function event(event $event)
    {

        return view('site.event.show',compact('event'));
    }





    public function category(category $category)
    {

        //return $category->events();

        $events = $category->events();
        return view('site.event.index',compact('events'));

    }


}
