<?php

namespace App\Http\Controllers\User;

use App\model\user\testimonialuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TestimonialUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.partials.testimonial.index');
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

            'name'=>'required|string|max:255',
            'username'=>'required|string|max:255',
            'body'=>'required',
            'image' =>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $testimonial_user = new TestimonialUser;
        $testimonial_user->name = $request->name;
        $testimonial_user->username = $request->username;
        $testimonial_user->body = $request->body;



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/'.$filename);
            Image::make($image)->resize(600, 600)->save($destinationPath);

            $testimonial_user->image = $filename;

        }

        $testimonial_user->save();



        alert()->success('Success', "Le Membre a été cree avec succès");
        return redirect()->back();
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
        //
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
        //
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
