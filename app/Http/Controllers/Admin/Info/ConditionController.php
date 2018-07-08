<?php

namespace App\Http\Controllers\Admin\Info;

use App\Model\user\condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ConditionController extends Controller
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
        $conditions = condition::all();
        return view('admin.partials.conditions.condition',compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partials.conditions.create');
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

            'title'=>'required|string',
            'body'=>'required|string',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg',


        ]);

        $condition = new Condition;
        $condition->title = $request->title;
        $condition->slug = $request->slug;
        $condition->body = $request->body;


        // Check if file is present
        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image');
            $filename = time().'.'.$cover_image->getClientOriginalName();
            $destinationPath = public_path('assets/img/conditions/'.$filename);
            Image::make($cover_image)->resize(1000, 500)->save($destinationPath);


            $condition->cover_image = $filename;

        }
        $condition->save();



        alert()->success('Good Job', "Conditions Create with success");
        return redirect(route('conditions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //$condition = Condition::where('slug',$slug)->first();
        //return view('site.event.show',compact('condition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condition = Condition::where('id',$id)->first();

        return view('admin.partials.conditions.edit',compact('condition'));
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

            'body'=>'required',
            'title'=>'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ]);


        $condition = Condition::find($id);

        $condition->title = $request->title;
        $condition->body = $request->body;

        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image');
            $filename = time().'.'.$cover_image->getClientOriginalName();
            $destinationPath = public_path('assets/img/conditions/'.$filename);
            Image::make($cover_image)->resize(1000, 500)->save($destinationPath);
            $oldFilename = $condition->cover_image;

            //Update to data base
            $condition->cover_image = $filename;
            // Delete old Image
            Storage::delete($oldFilename);
        }
        $condition->save();




        alert()->success('Success', "Mise a jour reussi");
        return redirect()->route('conditions.index',$condition->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $condition = Condition::findOrFail($request->condition_id);
        $condition->delete();

        Alert::success('Deleted!', 'Your file has been deleted.');
        return redirect()->back();
    }
}
