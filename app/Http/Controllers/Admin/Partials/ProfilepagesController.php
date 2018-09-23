<?php

namespace App\Http\Controllers\Admin\Partials;

use App\Model\user\partial\profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use File;
use Image;


class ProfilepagesController extends Controller
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
        $profiles = Profile::get();

        return view('admin.partials.profile_page.index',compact('profiles'));
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
    public function edit()
    {
        $profile = Profile::get();
        return view('admin.partials.profile_page.edit',compact('profile'));
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
        dd(request()->all());
        $this->validate($request,[
            'about_profile' =>"image|mimes:jpeg,png,jpg,gif,svg|max:4000",
            'contact_profile' =>"image|mimes:jpeg,png,jpg,gif,svg|max:4000",
            'login_profile' =>"image|mimes:jpeg,png,jpg,gif,svg|max:4000",
            'register_profile' =>"image|mimes:jpeg,png,jpg,gif,svg|max:4000",
            'reset-password_profile' =>"image|mimes:jpeg,png,jpg,gif,svg|max:4000",
            'testimonial_profile' =>"image|mimes:jpeg,png,jpg,gif,svg|max:4000",
        ]);

        $profile = profile::find($id);
        $profile->admin_id = Auth::user()->id;



        if ($request->hasFile('about_profile')) {
            $image = $request->file('about_profile');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/profile_page/'.$filename);
            Image::make($image)->resize(600, 600)->save($destinationPath);
            $oldFilename = $profile->image;

            //Update to data base
            $profile->image = $filename;
            // Delete old Image
            File::delete(public_path('assets/img/profile_page/'.$oldFilename));


        }
        $profile->save();

        alert()->success('Success', "Mise a jour reussi");
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
