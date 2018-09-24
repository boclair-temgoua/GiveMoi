<?php

namespace App\Http\Controllers\Admin\Partials\Slides;

use App\Model\user\partial\slides\slidescontact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class SlidescontactController extends Controller
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

        $slidescontacts= DB::table('slidescontacts')

            ->join('admins','slidescontacts.admin_id','=','admins.id')
            ->select('slidescontacts.*','admins.name')
            ->orderBy('created_at','DESC')->get();

        return view('admin.slides.slide_contact.index',compact('slidescontacts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_slide()
    {
        return view('admin.slides.slide_contact.create');
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

            'slide_contact' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);



        $slidescontact = new Slidescontact;

        $slidescontact->slug = $request->slug;
        $slidescontact->admin_id = auth()->user()->id;



        if ($request->hasFile('slide_contact')) {
            $slide_contact = $request->file('slide_contact');
            $filename = time().'.'.$slide_contact->getClientOriginalName();
            $destinationPath = public_path('assets/img/slides/'.$filename);
            Image::make($slide_contact)->save($destinationPath);


            $slidescontact->slide_contact = $filename;

        }

        $slidescontact->save();

        toastr()->success('<b>Slider created successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect(route('slide_contact',$slidescontact->slug));

    }


    public function unactive_slide($id)
    {
        DB::table('slidescontacts')
            ->where('id',$id)
            ->update(['status' => null]);
        toastr()->success('<b>Slide unactivated successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();

    }

    public function active_slide($id)
    {
        DB::table('slidescontacts')
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
        $slidescontact = Slidescontact::where('id',$id)->first();
        return view('admin.slides.slide_contact.edit',compact('slidescontact'));
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


        $slidescontact = Slidescontact::find($id);


        $slidescontact->admin_id = auth()->user()->id;






        if ($request->hasFile('slide_contact')) {
            $slide_contact = $request->file('slide_contact');
            $filename = time().'.'.$slide_contact->getClientOriginalName();
            $destinationPath = public_path('assets/img/slides/'.$filename);
            Image::make($slide_contact)->save($destinationPath);
            $oldFilename = $slidescontact->slide_contact;

            //Update to data base
            $slidescontact->slide_contact = $filename;
            // Delete old Image
            File::delete(public_path('assets/img/slides/'.$oldFilename));


        }





        $slidescontact->save();

        toastr()->success('<b>Slider updated successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect(route('slide_contact',$slidescontact->slug));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_slide(Request $request)
    {
        $slidescontact = Slidescontact::findOrFail($request->slidescontact_id);
        $slidescontact->delete();



        if ($slidescontact->slide_contact){
            $oldFilename = $slidescontact->slide_contact;

            File::delete('assets/img/slides/'.$oldFilename);
        }

        toastr()->success('<b>Your file has been deleted</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect()->back();
    }
}
