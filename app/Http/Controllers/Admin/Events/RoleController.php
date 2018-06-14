<?php

namespace App\Http\Controllers\Admin\Events;


use App\permission;
use App\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
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
        $roles = Role::all();
        return view('admin.partials.role.show',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.partials.role.create', compact('permissions'));
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

            'display_name'=>'required|max:255|unique:roles',
            //'name'=>'required|max:255|alphadash|unique:permissions,name',
            'description'=>'sometimes|max:255',

        ]);

        $role = new Role;
        $role->display_name = $request->display_name;
        $role->slug = $request->slug;
        $role->description = $request->description;
        $role->save();




        alert()->success('Success', "The Role has been successfully Created");
        return redirect(route('roles.index',$role->slug));
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
        $role = Role::find($id);
        $permissions = Permission::all();

        return view('admin.partials.role.edit',compact('role','permissions'));

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

        return $request->all();
        $this->validate($request,[

            'display_name'=>'required|max:255',
            'description'=>'sometimes|max:255',

        ]);

        $role = Role::find($id);
        $role->display_name = $request->display_name;
        $role->slug = $request->slug;
        $role->description = $request->description;
        $role->save();


        //alert()->success('Success', "The Role has been successfully Updated");
        Session::flash('success','The Role has been successfully Updated');
        return redirect(route('roles.index',$role->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $role->delete();

        //session()->put('success','Item created successfully.');
        Alert::success('Deleted!', 'Your file has been deleted.');
        return redirect(route('roles.index',$role->slug));
    }
}
