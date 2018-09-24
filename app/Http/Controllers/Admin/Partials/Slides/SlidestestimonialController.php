<?php

namespace App\Http\Controllers\Admin\Partials\Slides;

use App\Model\user\partial\slides\slidestestimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class SlidestestimonialController extends Controller
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
    public function AllSlide()
    {

        $slidestestimonials= DB::table('slidestestimonials')

            ->join('admins','slidestestimonials.admin_id','=','admins.id')
            ->select('slidestestimonials.*','admins.name')
            ->orderBy('created_at','DESC')->get();

        return view('admin.slides.slide_testimonial.index',compact('slidestestimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_slide()
    {
        return view('admin.slides.slide_testimonial.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_slide(Request $request)
    {
        //dd(\request()->all()); // pour tester les donner qui entre dans la base de donner
        $this->validate($request,[

            'slide_testimonial' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);



        $slidestestimonial = new Slidestestimonial;

        $slidestestimonial->slug = $request->slug;
        $slidestestimonial->admin_id = auth()->user()->id;



        if ($request->hasFile('slide_testimonial')) {
            $slide_testimonial = $request->file('slide_testimonial');
            $filename = time().'.'.$slide_testimonial->getClientOriginalName();
            $destinationPath = public_path('assets/img/slides/'.$filename);
            Image::make($slide_testimonial)->save($destinationPath);


            $slidestestimonial->slide_testimonial = $filename;

        }

        $slidestestimonial->save();

        toastr()->success('<b>Slider created successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect(route('slide_testimonial',$slidestestimonial->slug));

    }


    public function unactive_slide($id)
    {
        DB::table('slidestestimonials')
            ->where('id',$id)
            ->update(['status' => null]);
        toastr()->success('<b>Slide unactivated successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();

    }

    public function active_slide($id)
    {
        DB::table('slidestestimonials')
            ->where('id',$id)
            ->update(['status' => 1]);
        toastr()->success('<b>Slide activated successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();

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
    public function edit_slide($id)
    {
        $slidestestimonial = Slidestestimonial::where('id',$id)->first();
        return view('admin.slides.slide_testimonial.edit',compact('slidestestimonial'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_slide(Request $request, $id)
    {


        $slidestestimonial = Slidestestimonial::find($id);


        $slidestestimonial->admin_id = auth()->user()->id;






        if ($request->hasFile('slide_testimonial')) {
            $slide_testimonial = $request->file('slide_testimonial');
            $filename = time().'.'.$slide_testimonial->getClientOriginalName();
            $destinationPath = public_path('assets/img/slides/'.$filename);
            Image::make($slide_testimonial)->save($destinationPath);
            $oldFilename = $slidestestimonial->slide_testimonial;

            //Update to data base
            $slidestestimonial->slide_testimonial = $filename;
            // Delete old Image
            File::delete(public_path('assets/img/slides/'.$oldFilename));


        }





        $slidestestimonial->save();

        toastr()->success('<b>Slider updated successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect(route('slide_testimonial',$slidestestimonial->slug));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_slide(Request $request)
    {
        $slidestestimonial = Slidestestimonial::findOrFail($request->slidestestimonial_id);
        $slidestestimonial->delete();



        if ($slidestestimonial->slide_testimonial){
            $oldFilename = $slidestestimonial->slide_testimonial;

            File::delete('assets/img/slides/'.$oldFilename);
        }

        toastr()->success('<b>Your file has been deleted</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect()->back();
    }
}
