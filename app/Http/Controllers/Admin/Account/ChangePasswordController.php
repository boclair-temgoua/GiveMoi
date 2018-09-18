<?php

namespace App\Http\Controllers\Admin\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;


class ChangePasswordController extends Controller
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
     * Where to redirect users after password is changed.
     *
     * @var string $redirectTo
     */
    protected $redirectTo = '/admin/change_password';

    /**
     * Change password form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        $admin = Auth::getUser();
        return view('admin.account.change_password', compact('admin'));
    }
    /**
     * Change password.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        //dd(\request()->all());
        $admin = Auth::getUser();
        $this->validator($request->all())->validate();
        if (Hash::check($request->get('current_password'), $admin->password)) {

            $admin->password = Hash::make($request->password);
            $admin->save();
            //toastr()->success('<b>Password change successfully!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
            alert()->success('Good job', 'Password change successfully');
            return redirect($this->redirectTo);
        } else {
            toastr()->error('<b>Current password is incorrect </b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
            return redirect()->back();
        }
    }

    /**
     * Get a validator for an incoming change password request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }
}
