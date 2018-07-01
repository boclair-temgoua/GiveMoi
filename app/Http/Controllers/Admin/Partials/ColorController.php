<?php

namespace App\Http\Controllers\Admin\Partials;

use App\Model\user\partial\color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ColorController extends Controller
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
        $colors = Color::all();
        return view('admin.partials.color.show',compact('colors'));
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
        $this->validate($request,[

            'name'=>'required|string|unique:colors',

        ]);

        $color = new Color;
        $color->slug = $request->slug;
        $color->name = $request->name;
        $color->save();



        $notification = array(
            'message' => 'The Color has been successfully Created',
            'alert-type' => 'success',

        );
        return back()->with($notification);
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
    public function update(Request $request)
    {
        $color = Color::findOrFail($request->color_id);

        $color->name = $request->name;
        $color->slug = $request->slug;
        $color->save();



        $notification = array(
            'message' => 'The Color has been successfully Update',
            'alert-type' => 'success',

        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $color = Color::findOrFail($request->color_id);
        $color->delete();

        //session()->put('success','Item created successfully.');
        //Alert::success('Deleted!', 'Your file has been deleted.');
        $notification = array(
            'message' => 'The Color has been successfully Created',
            'alert-type' => 'success',

        );
        return back()->with($notification);
    }
}
