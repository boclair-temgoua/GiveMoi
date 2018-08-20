<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\about;
use App\Model\user\presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;

class AboutController extends Controller
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
        $abouts = about::all();
        return view('admin.about.show',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.about');
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

            'fullname'=>'required|string|unique:abouts|max:255',
            'body'=>'required',
            'role'=>'required',
            'avatar' =>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);



        $about = new About;
        $about->role = $request->role;
        $about->fullname = $request->fullname;
        $about->body = $request->body;
        $about->fblink = $request->fblink;
        $about->googlelink = $request->googlelink;
        $about->instlink = $request->instlink;
        $about->twlink = $request->twlink;
        $about->linklink = $request->linklink;
        $about->dribbblelink = $request->dribbblelink;





        // Check if file is present
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/about/'.$filename);
            Image::make($image)->resize(600, 600)->save($destinationPath);


            $about->image = $filename;

        }

        $about->save();



        alert()->success('Success', "Le Membre a été cree avec succès");
        return redirect(route('about.index',$about->slug));
    }

    public function unactive_about($id)
    {
        DB::table('abouts')
            ->where('id',$id)
            ->update(['status' => null]);
        toastr()->success('<b>Member unactive successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();

    }

    public function active_about($id)
    {
        DB::table('abouts')
            ->where('id',$id)
            ->update(['status' => 1]);
        toastr()->success('<b>Member activated successfully</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
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
        $about = About::where('id',$id)->first();

        return view('admin.about.view',compact('about'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::where('id',$id)->first();

        return view('admin.about.edit',compact('about'));
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
            'avatar' =>'image|mimes:jpg,jpeg,png,gif',
        ]);

        $about = about::find($id);

        $about->role = $request->role;
        $about->fullname = $request->fullname;
        $about->body = $request->body;
        $about->fblink = $request->fblink;
        $about->googlelink = $request->googlelink;
        $about->instlink = $request->instlink;
        $about->twlink = $request->twlink;
        $about->linklink = $request->linklink;
        $about->dribbblelink = $request->dribbblelink;



        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/about/'.$filename);
            Image::make($image)->resize(600, 600)->save($destinationPath);
            $oldFilename = $about->image;

            //Update to data base
            $about->image = $filename;
            // Delete old Image
            File::delete(public_path('assets/img/about/'.$oldFilename));


        }
        $about->save();

        alert()->success('Success', "Mise a jour reussi");
        return redirect()->route('about.index',$about->slug);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $about = About::findOrFail($request->about_id);
        $about->delete();

        if ($about->image != 'no_image'){

            File::delete('assets/img/about/'.$about->image);
        }

        Alert::success('Deleted!', 'Your file has been deleted.');
        return redirect()->back();
    }
}
