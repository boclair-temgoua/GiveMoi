<?php

namespace App\Http\Controllers\Admin\Partials\Slides;

use App\Model\user\partial\slides\slidesabout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;
use File;


class SlidesaboutController extends Controller
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

        $slidesabouts= DB::table('slidesabouts')

            ->join('admins','slidesabouts.admin_id','=','admins.id')
            ->select('slidesabouts.*','admins.name')
            ->orderBy('created_at','DESC')->get();

        return view('admin.slides.slide_about.index',compact('slidesabouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_slide()
    {
        return view('admin.slides.slide_about.create');
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

            'slide_about' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);



        $slidesabout = new Slidesabout;

        $slidesabout->slug = $request->slug;
        $slidesabout->admin_id = auth()->user()->id;



        if ($request->hasFile('slide_about')) {
            $slide_about = $request->file('slide_about');
            $filename = time().'.'.$slide_about->getClientOriginalName();
            $destinationPath = public_path('assets/img/slides/'.$filename);
            Image::make($slide_about)->save($destinationPath);


            $slidesabout->slide_about = $filename;

        }

        $slidesabout->save();

        toastr()->success('<b>Slider created successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect(route('slide_about',$slidesabout->slug));

    }

    public function unactive_slide($id)
    {
        DB::table('slidesabouts')
            ->where('id',$id)
            ->update(['status' => null]);
        toastr()->success('<b>Slide unactivated successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();

    }

    public function active_slide($id)
    {
        DB::table('slidesabouts')
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
        $slidesabout = Slidesabout::where('id',$id)->first();
        return view('admin.slides.slide_about.edit',compact('slidesabout'));

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


        $slidesabout = Slidesabout::find($id);


        $slidesabout->admin_id = auth()->user()->id;






        if ($request->hasFile('slide_about')) {
            $slide_about = $request->file('slide_about');
            $filename = time().'.'.$slide_about->getClientOriginalName();
            $destinationPath = public_path('assets/img/slides/'.$filename);
            Image::make($slide_about)->save($destinationPath);
            $oldFilename = $slidesabout->slide_about;

            //Update to data base
            $slidesabout->slide_about = $filename;
            // Delete old Image
            File::delete(public_path('assets/img/slides/'.$oldFilename));


        }





        $slidesabout->save();

        toastr()->success('<b>Slider updated successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect(route('slide_about',$slidesabout->slug));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_slide(Request $request)
    {
        $slidesabout = Slidesabout::findOrFail($request->slidesabout_id);
        $slidesabout->delete();



        if ($slidesabout->slide_about){
            $oldFilename = $slidesabout->slide_about;

            File::delete('assets/img/slides/'.$oldFilename);
        }

        toastr()->success('<b>Your file has been deleted</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect()->back();
    }

}
