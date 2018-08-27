<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\partial\color;
use App\Model\user\presentation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;

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
        $presentations= DB::table('presentations')

            ->join('admins','presentations.admin_id','=','admins.id')
            ->join('colors','presentations.color_id','=','colors.id')
            ->select('presentations.*','colors.color_slug','admins.name')
            ->orderBy('created_at','DESC')->get();


        return view('admin.presentation.show',compact('presentations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = color::all();
        return view('admin.presentation.create',compact('colors'));
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
            'color_id'=>'required',
            'body'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'


        ]);



        $presentation = new Presentation;
        $presentation->title = $request->title;
        $presentation->color_id = $request->color_id;
        $presentation->slug = $request->slug;
        $presentation->icon = $request->icon;
        $presentation->body = $request->body;
        $presentation->admin_id = Auth::user()->id;



        // Check if file is present
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/about/presentation/'.$filename);
            Image::make($image)->save($destinationPath);


            $presentation->image = $filename;

        }


        $presentation->save();


        //Session::flash('success','Your Presentation has been created');


        toastr()->success('<b>Your Presentation has been created !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect(route('presentation.index',$presentation->slug));
    }


    /**
     * Active and unactivated presentation
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unactive_presentation($id)
    {
        DB::table('presentations')
            ->where('id',$id)
            ->update(['status' => null]);
        toastr()->success('<b>Presentation unactive successfully !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();

    }

    public function active_presentation($id)
    {
        DB::table('presentations')
            ->where('id',$id)
            ->update(['status' => 1]);
        toastr()->success('<b>Presentation activated successfully  !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
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

        $colors = color::all();
        $presentation = Presentation::where('id',$id)->first();;
        return view('admin.presentation.edit',compact('presentation','colors'));
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
        //dd(\request()->all());
        $this->validate($request,[
            'title'=>'required',
            'icon'=>'required',
            'body'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $presentation = Presentation::find($id);
        $presentation->title = $request->title;
        $presentation->slug = $request->slug;
        $presentation->icon = $request->icon;
        $presentation->body = $request->body;
        $presentation->color_id = $request->color_id;
        $presentation->admin_id = Auth::user()->id;






        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('assets/img/about/presentation/'.$filename);
            Image::make($image)->save($destinationPath);
            $oldFilename = $presentation->image;

            //Update to data base
            $presentation->image = $filename;
            // Delete old Image
            File::delete(public_path('assets/img/about/presentation/'.$oldFilename));
        }

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

        if ($presentation->image != 'no_image'){

            File::delete('assets/img/about/presentation/'.$presentation->image);
        }

        Alert::success('Deleted!', 'Your file has been deleted.');
        return redirect()->back();
    }
}
