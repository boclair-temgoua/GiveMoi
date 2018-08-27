<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
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
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permissions = Permission::orderBy('created_at','DESC')->get();

        return view('admin.partials.permission.show', compact('permissions'));
    }

    /**
     * Show the form for creating new Permission.
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

            'name'=> "required|string|max:255|unique:permissions",

        ]);
        Permission::create($request->all());

        //alert()->success('Success', "Permission has ben created successfully");
        toastr()->success('<b>Permission has been created !</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect()->back();
    }

    public function edit($id)
    {

        $permission = Permission::findOrFail($id);

        return view('admin.partials.permission.edit', compact('permission'));
    }

    /**
     * Update Permission in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name'=> "required|string|max:255",
        ]);
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());


        toastr()->success('<b>Permission has been Update !</b> ','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>',['timeOut'=>5000]);
        return redirect()->route('permissions.index');
    }









    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $permission = Permission::findOrFail($request->permission_id);
        $permission->delete();



        toastr()->success('<b>Permission has been deleted!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;

        Permission::whereIn('id',explode(",",$ids))->delete();

        return response()->json(['status'=>true,'message'=>"Permission deleted successfully."]);

    }
}
