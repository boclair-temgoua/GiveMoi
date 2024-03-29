<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;



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

        $testimonials= DB::table('testimonials')

            ->join('admins','testimonials.admin_id','=','admins.id')
            ->select('testimonials.*','admins.name')
            ->orderBy('created_at','DESC')->get();


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
            'image' =>'required|sometimes|image|mimes:jpeg,png,jpg,gif,svg',

        ]);


        $testimonial = new Testimonial;
        $testimonial->role = $request->role;
        $testimonial->fullname = $request->fullname;
        $testimonial->body = $request->body;
        $testimonial->admin_id = Auth::user()->id;



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/testimonial/'.$filename);
            Image::make($image)->resize(600, 600)->save($destinationPath);
            $oldFilename = $testimonial->image;

            $testimonial->image = $filename;


        }

        $testimonial->save();



        alert()->success('Success', "Le Membre a été cree avec succès");
        return redirect(route('testimonial.index'));
    }

    public function unactive_testimonial($id)
    {
        DB::table('testimonials')
            ->where('id',$id)
            ->update(['status' => null]);
        toastr()->success('<b>Testimonial unactivated </b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();

    }

    public function active_testimonial($id)
    {
        DB::table('testimonials')
            ->where('id',$id)
            ->update(['status' => 1]);
        toastr()->success('<b>Testimonial activated </b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
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
       // $this->authorize('update-testimonial',$testimonial);

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
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $testimonial = testimonial::find($id);

        $testimonial->role = $request->role;
        //$about->avatar = $imageName;
        $testimonial->fullname = $request->fullname;
        $testimonial->body = $request->body;
        $testimonial->admin_id = Auth::user()->id;




        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = 'assets/img/testimonial/'.$filename ;
            Image::make($image)->resize(400, 400)->save($destinationPath);
            $oldFilename = $testimonial->image;



            $testimonial->image = $filename;
            // Delete old Image
            File::delete(public_path('assets/img/testimonial/'.$oldFilename));


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

        if ($testimonial->image != 'no_image'){

            File::delete('assets/img/testimonial/'.$testimonial->image);
        }

        Alert::success('Deleted!', 'Your file has been deleted.');
        return redirect()->back();
    }


    public function deleteMultiple(Request $request){

        $ids = $request->ids;

        Testimonial::whereIn('id',explode(",",$ids))->delete();

        return response()->json(['status'=>true,'message'=>"Testimonial deleted successfully."]);

    }
}
