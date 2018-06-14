<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\presentation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('admin.presentation.create');
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
            'color'=>'required',
            'body'=>'required',

        ]);



        $presentation = new Presentation;
        $presentation->title = $request->title;
        $presentation->slug = $request->slug;
        $presentation->color = $request->color;
        $presentation->icon = $request->icon;
        $presentation->body = $request->body;





        $presentation->save();


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

        $presentation = Presentation::where('id',$id)->first();;
        return view('admin.presentation.edit',compact('presentation'));
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
        ]);

        $presentation = Presentation::find($id);
        $presentation->title = $request->title;
        $presentation->slug = $request->slug;
        $presentation->color = $request->color;
        $presentation->icon = $request->icon;
        $presentation->body = $request->body;;
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
