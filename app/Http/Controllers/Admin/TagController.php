<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
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
        $tags = tag::all();
        return view('admin.tag.show',compact('tags'));
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

            'name'=>'required',

        ]);

        $tag = new Tag;
        $tag->slug = $request->slug;
        $tag->name = $request->name;
        $tag->save();



       // $.notify("Enter: Fade In and DownExit: Fade Out and Up");
        alert()->success('Success', "Le Tag a été créée avec succès");
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = tag::where('id',$id)->first();

        return view('admin.tag.edit',compact('tag'));
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
        $tag = Tag::findOrFail($request->tag_id);

        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();


        alert()->success('Success', "The Tag has been successfully Updated");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $tag = Tag::findOrFail($request->tag_id);
        $tag->delete();

        //session()->put('success','Item created successfully.');
       Alert::success('Deleted!', 'Your file has been deleted.');
       return redirect()->back();
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;

        //About::whereIn('id',explode(",",$ids))->delete();

        DB::table("tags")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['status'=>true,'message'=>"Message Tag deleted successfully."]);

    }
}
