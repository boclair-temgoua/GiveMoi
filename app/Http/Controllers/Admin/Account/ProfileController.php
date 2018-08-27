<?php

namespace App\Http\Controllers\Admin\Account;

use App\Model\admin\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
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
        $users = admin::all();
        return view('admin.partials.administrator.show',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.partials.administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(\request()->all()); // pour tester les donner qui entre dans la base de donner

        $this->validate($request,[

            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',

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
        $admin->email = $request->email;
        $admin->password = Hash::make($password);


        if ($admin->save()){
            alert()->success('God Job', 'The Administrator has been successfully Created');
            return redirect()->route('administrators.index', $admin->id);
        }else{

            alert()->error('Oops...', 'Quelque chose s\'est mal passé  avec la ceation de l\'utilisateur!');
            return redirect()->route('administrators.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::where('id',$id)->first();

        return view('admin.partials.administrator.view',compact('admin'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::where('id',$id)->first();

        return view('admin.partials.administrator.edit',compact('admin'));
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
        dd(request()->all());
        $this->validate($request,[

            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'avatar' =>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $admin = admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->avatar = $request->avatar;
        $admin->email = $request->email;



        if (isset($data['avatar'])) {
            $admin->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }



        if ($request->password_options == 'auto'){

            $length = 10;
            $keyspace = '2y$10$d4gjolCjg/VLPbpbRkNuNOKneeSEoP3dQao6iEHEiY65S31QTAAvW';
            $str= '';
            $max = mb_strlen($keyspace,'8bit') -1;
            for ($i = 0; $i < $length; ++$i){
                $str .= $keyspace[random_int(0,$max)];
            }
            $admin->password = Hash::make($str);
        }elseif ($request->password_options == 'manual'){
            $admin->password = Hash::make($request->password);

        }

        if ($admin->save()){
           // return redirect(route('admin.account'))
            Alert::success('Success', 'The profile has been updated');
            return redirect()->route('admin.account', $admin->username);
        }else{

            alert()->error('Oops...', 'Quelque chose s\'est mal passé  avec la ceation de l\'utilisateur!');
            return redirect(route('admin.account'));
        }
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
}
