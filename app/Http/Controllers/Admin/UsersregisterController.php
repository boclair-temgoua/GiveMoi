<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersregisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware(['role:super-admin|admin|editor|moderator|advertiser|visitor']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id','DESC')->get();
        return view('admin.partials.user.show',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.partials.user.create');
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

            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',

        ]);

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

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($password);


        if ($user->save()){
            return redirect()->route('user.index', $user->id);
        }else{

            alert()->error('Oops...', 'Quelque chose s\'est mal passé  avec la ceation de l\'utilisateur!');
            return redirect()->route('user.create');
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
        //$user = User::where('id',$id)->first();

        $user = User::findOrFail($id);
        return view("admin.partials.user.view")->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);
        return view("admin.partials.user.edit")->withUser($user);
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

            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',

        ]);

        $user = user::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;


        if ($request->password_options == 'auto'){

            $length = 10;
            $keyspace = '2y$10$d4gjolCjg/VLPbpbRkNuNOKneeSEoP3dQao6iEHEiY65S31QTAAvW';
            $str= '';
            $max = mb_strlen($keyspace,'8bit') -1;
            for ($i = 0; $i < $length; ++$i){
                $str .= $keyspace[random_int(0,$max)];
            }
            $user->password = Hash::make($str);
        }elseif ($request->password_options == 'manual'){
            $user->password = Hash::make($request->password);

        }

        if ($user->save()){
            return redirect()->route('user.index', $user->id);
        }else{

            alert()->error('Oops...', 'Quelque chose s\'est mal passé  avec la ceation de l\'utilisateur!');
            return redirect()->route('user.edit', $id);
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
        $user = User::findOrFail($request->user_id);
        $user->delete();

        Alert::success('Deleted!', 'The User has been successfully deleted');
        return redirect()->back();
    }
}
