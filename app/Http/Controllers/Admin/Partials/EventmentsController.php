<?php

namespace App\Http\Controllers\Admin\Partials;

use App\Http\Requests\Admin\EventmentsRequest;
use App\Model\user\eventment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventmentsController extends Controller
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
       if (request('show_deleted') == 1) {

           $eventments = Eventment::onlyTrashed()->get();
       } else {
           $eventments = Eventment::all();
       }

        return view('admin.eventments.index', compact('eventments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventmentsRequest $request)
    {

        $eventment = Eventment::create($request->all());

        toastr()->success('<b>Event has been Created !</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
