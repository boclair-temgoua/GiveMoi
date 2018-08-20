<?php

namespace App\Http\Controllers\Admin\Partials;

use App\Model\user\partial\color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Response;
use Validator;

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
    //public function store(Request $request)
    //{
    //    $validator = Validator::make(Input::all(), $this->rules);
    //    if ($validator->fails()) {
    //        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    //    } else {
    //        $color = new Color();
    //        $color->slug = $request->slug;
    //        $color->name = $request->name;
    //        $color->save();
    //        return response()->json($color);
    //    }
    //}
   public function store(Request $request)
   {
       $this->validate($request,[

           'color_name'=>'required|string|unique:colors',

       ]);

       $color = new Color;
       $color->slug = $request->slug;
       $color->color_name = $request->color_name;
       $color->color_slug = $request->color_slug;
       $color->save();



       toastr()->success('<b>The Color has been Created !</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
       return back();
   }


    public function unactive_color($id)
    {
        DB::table('colors')
            ->where('id',$id)
            ->update(['status' => null]);
        toastr()->success('<b>Color unactive successfully !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();

    }

    public function active_color($id)
    {
        DB::table('colors')
            ->where('id',$id)
            ->update(['status' => 1]);
        toastr()->success('<b>Color activated successfully  !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
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
        $color = Color::findOrFail($id);

        return view('admin.partials.color.show', ['color' => $color]);
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


        $color->slug = $request->slug;
        $color->color_name = $request->color_name;
        $color->color_slug = $request->color_slug;
        $color->save();


        toastr()->success('<b>The Color has been successfully Update !</b> ','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>',['timeOut'=>5000]);
        return back();
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
        toastr()->success('<b>The Color has been successfully Created !</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();
    }

}
