<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\partial\color;
use App\Model\user\presentation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use Storage;

class PresentationController extends Controller
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
        $presentations = presentation::all();
        return view('admin.presentation.show',compact('presentations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = color::all();
        return view('admin.presentation.create',compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(\request()->all()); // pour tester les donner qui entre dans la base de donner
        $this->validate($request,[

            'title'=>'required',
            'icon'=>'required',
            'body'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'


        ]);



        $presentation = new Presentation;
        $presentation->title = $request->title;
        $presentation->slug = $request->slug;
        $presentation->icon = $request->icon;
        $presentation->body = $request->body;



        // Check if file is present
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/about/'.$filename);
            Image::make($image)->resize(1000, 500)->save($destinationPath);


            $presentation->image = $filename;

        }else{
            $destinationPath = 'noimage.jpg';
        }


        $presentation->save();
        $presentation->colors()->sync($request->colors);


        //Session::flash('success','Your Presentation has been created');

        $notification = array(
            'message' => 'I am a successful message!',
            'alert-type' => 'success',
            'positionClass' => 'toast-top-center'
        );
        return redirect(route('presentation.index',$presentation->slug))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $presentation = Presentation::where('id',$id)->first();;
        return view('admin.presentation.view',compact('presentation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $colors = color::all();
        $presentation = Presentation::where('id',$id)->first();;
        return view('admin.presentation.edit',compact('presentation','colors'));
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
            'title'=>'required',
            'icon'=>'required',
            'body'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $presentation = Presentation::find($id);
        $presentation->title = $request->title;
        $presentation->slug = $request->slug;
        $presentation->icon = $request->icon;
        $presentation->body = $request->body;






        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/about/'.$filename);
            Image::make($image)->resize(1000, 500)->save($destinationPath);
            $oldFilename = $presentation->image;

            //Update to data base
            $presentation->image = $filename;
            // Delete old Image
            Storage::delete($oldFilename);
        }

        $presentation->colors()->sync($request->colors);
        $presentation->save();





        Toastr::success('Update presentation successfully', '', ["positionClass" => "toast-top-center"]);
        return redirect()->route('presentation.index',$presentation->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $presentation = Presentation::findOrFail($request->presentation_id);
        $presentation->delete();

        Alert::success('Deleted!', 'Your file has been deleted.');
        return redirect()->back();
    }
}
