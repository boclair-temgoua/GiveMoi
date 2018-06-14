<?php

namespace App\Http\Controllers\Admin\Events;


use App\permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
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
        $permissions = Permission::all();
        return view('admin.partials.permission.show',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partials.permission.create');
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

            'display_name'=>'required|max:255|unique:permissions',


        ]);

        $permission = new Permission;
        $permission->display_name = $request->display_name;
        $permission->name = $request->name;
        $permission->save();



        // $.notify("Enter: Fade In and DownExit: Fade Out and Up");
        alert()->success('Success', "The Permission has been successfully Created");
        return redirect(route('permissions.index',$permission->name));
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
    public function update(Request $request, Permission $permission)
    {
        $permission = Permission::findOrFail($request->permission_id);

        $permission->display_name = $request->display_name;
        $permission->name = $request->name;
        $permission->save();


        alert()->success('Success', "The Permission has been successfully Updated");
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $testimonial = Permission::findOrFail($request->permission_id);
        $testimonial->delete();

        Alert::success('Deleted!', 'Your file has been deleted.');
        return redirect()->back();
    }
}
