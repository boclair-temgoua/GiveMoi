<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Image;



class TestimonialController extends Controller
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
        $testimonials = testimonial::all();
        return view('admin.testimonial.show',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.testimonial');
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

            'fullname'=>'required|string|unique:testimonials|max:255',
            'body'=>'required',
            'role'=>'required',
            'image' =>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $testimonial = new Testimonial;
        $testimonial->role = $request->role;
        $testimonial->fullname = $request->fullname;
        $testimonial->body = $request->body;



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/'.$filename);
            Image::make($image)->resize(600, 600)->save($destinationPath);

            $testimonial->image = $filename;

        }

        $testimonial->save();



        alert()->success('Success', "Le Membre a été cree avec succès");
        return redirect(route('testimonial.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::where('id',$id)->first();

        return view('admin.testimonial.view',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::where('id',$id)->first();

        return view('admin.testimonial.edit',compact('testimonial'));
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
            'fullname'=>'required|string|max:255',
            'body'=>'required',
            'role'=>'required',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $testimonial = testimonial::find($id);

        $testimonial->role = $request->role;
        //$about->avatar = $imageName;
        $testimonial->fullname = $request->fullname;
        $testimonial->body = $request->body;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/'.$filename);
            Image::make($image)->resize(600, 600)->save($destinationPath);
            $oldFilename = $testimonial->image;

            //Update to data base
            $testimonial->image = $filename;
            // Delete old Image
           Storage::delete($oldFilename);


        }


        $testimonial->save();

        alert()->success('Success', "Mise a jour reussi");
        return redirect()->route('testimonial.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $testimonial = Testimonial::findOrFail($request->testimonial_id);
        $testimonial->delete();

        Alert::success('Deleted!', 'Your file has been deleted.');
        return redirect()->back();
    }
}
