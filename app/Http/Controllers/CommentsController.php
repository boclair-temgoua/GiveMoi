<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Model\user\comment;
use App\Model\user\event;
use App\Notifications\NewCommentEvent;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class CommentsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(CommentRequest $request)
    {


        $event = Event::findOrFail($request->event_id);

        if(Response()->json()){
            $comment = new Comment();
            $comment->comment = Input::get('comment');
            $comment->user_id = Auth::id();
            $comment->event_id = $event->id;
            $comment->save();


        }




       // $comment = Comment::create([
       //     'comment' => $request->comment,
       //     'parent_id'  => Input::get('parent_id'),
       //     'user_id' => Auth::id(),
       //     'event_id' => $event->id
       // ]);

       // if ($event->user_id != $comment->user_id) {
       //     $user = User::find($event->user_id);
       //     $user->notify(new NewCommentEvent($comment));
       // }



        Toastr::success('Comment post with success','', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
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
    public function update(Request $request)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $comment = Comment::findOrFail($request->comment_id);

        if(auth()->user()->id !==$comment->user_id){

            Toastr::error('Unauthorized delete this comment contact author!','', ["positionClass" => "toast-top-center"]);
            return back();

        }

        $comment->delete();

        Toastr::success('Your comment deleted with success','', ["positionClass" => "toast-top-center"]);
        return redirect()->back()->with('success','Event delete with success!');
    }
}
