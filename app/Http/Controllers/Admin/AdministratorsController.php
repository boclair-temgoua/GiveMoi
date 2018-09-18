<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Hash;

class AdministratorsController extends Controller
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

        //Delete all data
       //$admins = Admin:: get ();
       //$admins = Admin:: find ( 1 )->delete ();


        // Show all administrators

        //$admins = Admin::orderBy('created_at','DESC')->get();
        $admins = Admin::get();

        return view('admin.partials.administrator.show',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'name');
        return view('admin.partials.administrator.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(\request()->all());
        $this->validate($request, [

            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            "gender" => "required|in:Female,Male",
            'birthday' => 'required|before:today',
            'avatar' =>"image|mimes:jpeg,png,jpg,gif,svg",
            'roles' => 'required',
            ///'password' => 'required|same:confirm-password',

        ]);


        //Password
        if ($request->has('password') && !empty($request->password)) {
            $password = trim($request->password);
        }else{

            $length = 10;
            $keyspace = '2y$10$d4gjolCjg/VLPbpbRkNuNOKneeSEoP3dQao6iEHEiY65S31QTAAvW';
            $str= '';
            $max = mb_strlen($keyspace,'8bit') -1;
            for ($i = 0; $i< $length; ++$i){
                $str .= $keyspace[random_int(0,$max)];
            }
            $password =  $str;
        }

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->birthday = $request->birthday;
        $admin->email = $request->email;
        $admin->gender = $request->gender;
        $admin->avatar = $request->avatar;
        $admin->password = Hash::make($password);
        $admin->admin_id = Auth::user()->name;
        $admin->save();


        $roles = $request->input('roles') ? $request->input('roles') : [];
        $admin->assignRole($roles);


        toastr()->success('<b>Administrator Created !!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return redirect(route('administrators.index'));
        //return redirect()->route('administrators.index', $admin->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $admin = Admin::findOrFail($id);
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.partials.administrator.view',compact('admin','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::get()->pluck('name', 'name');
        return view('admin.partials.administrator.edit',compact('admin','roles'));
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
        //dd(request()->all());
        $this->validate($request, [
            'name' => 'required',
            'username' => "required|string|min:2|max:25|unique:admins,username,{$id}",
            'email' => 'required|email|unique:admins,email,'.$id,
            'avatar' =>"image|mimes:jpeg,png,jpg,gif,svg",
            'birthday' => 'required|before:today',
            'roles' => 'required',


        ]);


        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->birthday = $request->birthday;
        $admin->email = $request->email;
        $admin->avatar = $request->avatar;
        $admin->gender = $request->gender;
        $admin->admin_id = Auth::user()->name;

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $admin->syncRoles($roles);

        $admin->save();

        Alert::success('Success', 'The profile has been updated');
        return redirect()->back();
        //return redirect()->route('administrators.index', $admin->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $admin = Admin::findOrFail($request->admin_id);
        $admin->delete();

        Alert::success('Deleted!', 'The Administrator has been successfully deleted');
        return redirect()->back();
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;

        Admin::whereIn('id',explode(",",$ids))->delete();

        return response()->json(['status'=>true,'message'=>"Administrator deleted successfully."]);

    }
}
