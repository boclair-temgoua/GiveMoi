<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

Class ContactController extends Controller
{
    public function create()
    {
        return view('site.contact.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContactFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        $contact = [];
        $contact['name'] = $request->get('name');
        $contact['email'] = $request->get('email');
        $contact['msg'] = $request->get('msg');
        Mail::to(config('mail.support.address'))->send(new ContactEmail($contact));
        flash('Your message has been sent!')->success();
        return redirect()->route('contact.create');
    }
}
