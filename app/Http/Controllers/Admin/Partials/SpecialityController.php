<?php

namespace App\Http\Controllers\Admin\Partials;

use App\Model\user\partial\speciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SpecialityController extends Controller
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

    $specialities= DB::table('specialities')

        ->join('admins','specialities.admin_id','=','admins.id')
        ->select('specialities.*','admins.name')
        ->orderBy('created_at','DESC')->get();


        return view('admin.partials.contact.speciality.show',compact('specialities'));
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
        //dd(request()->all());
        $this->validate($request,[

            'speciality_name'=>'required|string|unique:specialities',

        ]);

        $speciality = new Speciality;
        $speciality->slug = $request->slug;
        $speciality->speciality_name = $request->speciality_name;
        $speciality->admin_id = auth()->user()->id;
        $speciality->save();



        toastr()->success('<b>Created successfully !</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();
    }



    public function unactive_speciality($id)
    {
        DB::table('specialities')
            ->where('id',$id)
            ->update(['status' => null]);
        toastr()->success('<b>Unactive successfully !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();

    }

    public function active_speciality($id)
    {
        DB::table('specialities')
            ->where('id',$id)
            ->update(['status' => 1]);
        toastr()->success('<b>Activated successfully  !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
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
        $speciality = Speciality::findOrFail($id);

        return view('admin.partials.contact.speciality.show', ['speciality' => $speciality]);
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
        $speciality = Speciality::findOrFail($request->speciality_id);


        $speciality->slug = $request->slug;
        $speciality->speciality_name = $request->speciality_name;
        $speciality->admin_id = auth()->user()->id;
        $speciality->save();


        toastr()->success('<b>Update successfully !</b> ','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>',['timeOut'=>5000]);
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

        $speciality = Speciality::findOrFail($request->speciality_id);
        $speciality->delete();


        toastr()->success('<b>Delete successfully </b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();
    }
}
