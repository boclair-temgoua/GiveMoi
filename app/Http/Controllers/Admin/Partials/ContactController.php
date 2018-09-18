<?php

namespace App\Http\Controllers\Admin\partials;

use App\Model\user\partial\contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
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


    public function AllContact()
    {
        $contacts = Contact::orderBy('updated_at','desc')->get();
        return view('admin.partials.contact.show',compact('contacts'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_contact(Request $request)
    {

        $contact = Contact::findOrFail($request->contact_id);
        $contact->delete();

        //session()->put('success','Item created successfully.');
        //Alert::success('Deleted!', 'Your file has been deleted.');
        toastr()->success('<b>The Message contact has been deleted!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;

        Contact::whereIn('id',explode(",",$ids))->delete();

        return response()->json(['status'=>true,'message'=>"Message contact-us deleted successfully."]);

    }
}
