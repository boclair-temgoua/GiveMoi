<?php

namespace App\Http\Controllers\Admin\Events;

use App\Model\user\category;
use App\Model\user\event;
use App\Model\user\partial\color;
use App\Model\user\tag;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EventsController extends Controller
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


        $events = Event::orderBy('created_at','desc')->get();
        return view('admin.events.events',compact('events'));


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
        $tags =tag::all();
        $colors =color::all();
        $categories =category::all();
        $event = Event::where('id',$id)->first();


        return view('admin.events.edit',compact('event','categories','tags','colors'));
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
            'body'=>'required|min:2',
            'city'=>'required|string|max:100',
            'country'=>'required|string|max:100',
            'summary'=>'required|string|max:255',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4999',

        ]);


        $event = Event::find($id);

        $event->title = $request->input('title');
        $event->city= $request->input('city');
        $event->color= $request->input('color');
        $event->body = $request->input('body');
        $event->country = $request->input('country');
        $event->summary = $request->input('summary');
        $event->category= $request->input('category');
        $event->name = $request->input('name');
        $event->tag = $request->input('tag');
        $event->slug = $request->input('slug');
        $event->status = $request->input('status');




        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image');
            $filename = time().'.'.$cover_image->getClientOriginalName();
            $destinationPath = public_path('assets/img/event/'.$filename);
            Image::make($cover_image)->resize(1000, 500)->save($destinationPath);
            $oldFilename = $event->cover_image;

            //Update to data base
            $event->cover_image = $filename;
            // Delete old Image
            Storage::delete($oldFilename);
        }




        $event->tags()->sync($request->tags);
        $event->colors()->sync($request->colors);
        $event->categories()->sync($request->categories);


        $event->save();


        Toastr::success('Event update with success','', ["positionClass" => "toast-top-center"]);
        return redirect(route('event.index',$event->slug))->with('success','Event update with success!');
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
        Toastr::success('Event delete with success','', ["positionClass" => "toast-top-center"]);
        return redirect()->back()->with('success','Event delete with success!');
    }
}
