<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactEmail;
use App\Http\Controllers\Controller;
use App\Model\user\partial\contact;
use App\Model\user\partial\slides\slidescontact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;


Class ContactController extends Controller
{

    public function create()
    {
        $slidescontacts = Slidescontact::where('status',1)->orderBy('created_at','DESC')->get();
        return view('site.contact.create',compact('slidescontacts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContactFormRequest  $request
     * @return \Illuminate\Http\Response
     */
     public function store(ContactFormRequest $request)
    {
        //dd(\request()->all());




        $contact = new Contact;
        $contact->name = $request->name;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->slug = $request->slug;
        $contact->subject = $request->subject;
        $contact->msg = $request->msg;


        $contact->save();

        Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'lastname' => $request->get('lastname'),
                'phone' => $request->get('phone'),
                'subject' => $request->get('subject'),
                'email' => $request->get('email'),
                'msg' => $request->get('msg')
            ),
            function ($message) {
                $message->from('hello@outlined.co');
                $message->to('poornima@outlined.co', 'outlined')
                    ->subject('New Contact Request from outlined');
            });

        alert()->success('Success', "Tank you for your message");
        return back();
    }





}
