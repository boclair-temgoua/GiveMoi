<?php

namespace App\Http\Controllers;

use App\Model\user\event;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EventsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at','DESC')->paginate(10);
        return view('site.event.index')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(\request()->all());
        $this->validate($request,[

            'title'=>'required|string|max:255',
            'body'=>'required',
            'city'=>'required|string|max:100',
            'country'=>'required|string|max:100',

        ]);

        $event = new Event;
        $event->title = $request->input('title');
        $event->city= $request->input('city');
        $event->body = $request->input('body');
        $event->country = $request->input('country');
        $event->category= $request->input('category');
        $event->name = $request->input('name');
        $event->tag = $request->input('tag');
        $event->slug = $request->input('slug');
        $event->status = $request->input('status');
        $event->posted_by = $request->input('posted_by');





        $event->save();



        alert()->success('Success', "L'Evenement a été cree avec succès");
        return redirect(route('events.index',$event->slug));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {


        $event = Event::where('slug',$slug)->first();
        return view('site.event.show',compact('event'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $event = Event::where('id',$id)->first();
        return view('site.event.edit',compact('event'));
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
        $this->validate($request,[

            'title'=>'required|string|max:255',
            'body'=>'required',
            'city'=>'required|string|max:100',
            'country'=>'required|string|max:100',

        ]);

        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->city= $request->input('city');
        $event->body = $request->input('body');
        $event->country = $request->input('country');
        $event->category= $request->input('category');
        $event->name = $request->input('name');
        $event->tag = $request->input('tag');
        $event->slug = $request->input('slug');
        $event->status = $request->input('status');
        $event->posted_by = $request->input('posted_by');




        $event->user_id = auth()->user()->id;
        $event->save();
        alert()->success('Success', "L'evenement a été mise a jour avec succès");
        return redirect(route('events.index',$event->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $event->delete();

        Alert::success('Deleted!', 'Your file has been deleted.');
        return redirect(route('events.index'));
    }
}
