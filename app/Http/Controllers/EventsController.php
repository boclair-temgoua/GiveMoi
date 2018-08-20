<?php

namespace App\Http\Controllers;

use App\Model\user\category;
use App\Model\user\event;
use App\Model\user\partial\color;
use App\Model\user\tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Purifier;
use Image;


class EventsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth',['except' => ['index','show']]);
        //$this->middleware('owner', ['only' => ['edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$events = Event::orderBy('title','DESC')->paginate(12);


        $events = Event::where('status',1)->orderBy('created_at','DESC')->paginate(12);
        $events->load('users');
        return view('site.event.index')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags =tag::all();
        $colors = color::all();
        $categories =category::all();
        return view('site.event.create',compact('tags','categories','colors'));
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

            'title'=>'required|unique:events|max:255',
            'body'=>'required|min:2',
            'city'=>'required|string|max:100',
            'summary'=>'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',


        ]);



        $event = new Event;

        $event->title = $request->input('title');
        $event->city= $request->input('city');
        $event->color= $request->input('color');
        $event->body= clean(Input::get('body'));
        //$event->body = $request->input('body');
        $event->country = $request->input('country');
        $event->summary = $request->input('summary');
        $event->name = $request->input('name');
        $event->tag = $request->input('tag');
        $event->slug = $request->input('slug');
        $event->status = $request->input('status');
        $event->user_id = Auth::user()->id;





        // Check if file is present
        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image');
            $filename = time().'.'.$cover_image->getClientOriginalName();
            $destinationPath = public_path('assets/img/event/'.$filename);
            Image::make($cover_image)->save($destinationPath);


            $event->cover_image = $filename;

        }else{
            $destinationPath = 'noimage.jpg';
    }



        $event->save();
        $event->tags()->sync($request->tags);
        $event->colors()->sync($request->colors);
        $event->categories()->sync($request->categories);


        Toastr::success('Event create with success','', ["positionClass" => "toast-top-center"]);
        return redirect(route('myaccount.home'))->with('success','Event create with success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {


        $event = Event::where('slug',$slug)->firstOrFail();
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

        $tags =tag::all();
        $colors =color::all();
        $categories =category::all();
        $event = Event::where('id',$id)->firstOrFail();


        if(auth()->user()->id !==$event->user_id){


            toastr()->error('<strong>Unauthorized edit this event contact Author</strong>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>', ['timeOut' => 5000]);
            return redirect('events')
                ->with('error',"Unauthorized edit this event contact Author.");
        }


        return view('site.event.edit',compact('event','categories','tags','colors'));
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
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ]);


        $event = Event::find($id);

        $event->title = $request->input('title');
        $event->city= $request->input('city');
        $event->color= $request->input('color');
        $event->body= clean(Input::get('body'));
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
            Image::make($cover_image)->save($destinationPath);
            $oldFilename = $event->cover_image;

            //Update to data base
            $event->cover_image = $filename;
            // Delete old Image
            Storage::delete($oldFilename);
        }




        $event->tags()->sync($request->tags);
        $event->colors()->sync($request->colors);
        $event->categories()->sync($request->categories);
        $event->user_id = Auth::user()->id;

        $event->save();


        Toastr::success('Event update with success','', ["positionClass" => "toast-top-center"]);
        return redirect(route('/', Auth::user()->username))->with('success','Event update with success!');
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



        if(auth()->user()->id !==$event->user_id){

            Toastr::error('','Unauthorized delete this event contact Author ', ["positionClass" => "toast-top-center"]);
            return redirect('events');
        }

        if ($event->cover_image != 'no_image'){

            Storage::delete('assets/img/event/'.$event->cover_image);
        }


        $event->delete();
        Toastr::success('Event delete with success','', ["positionClass" => "toast-top-center"]);
        return redirect()->back()->with('success','Event delete with success!');
    }
}
