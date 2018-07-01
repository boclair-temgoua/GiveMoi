<?php

namespace App\Http\Controllers\Api;

use App\Model\user\like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LikesController extends Controller
{
    /**
     * Like a comment
     * @return Response
     */
    public function commentLike()
    {
// using a command bus. Basically making a post to the likes table assigning user_id and comment_id then redirect back
        extract(Input::only('user_id', 'comment_id'));

        $this->execute(new CommentLikeCommand($user_id, $comment_id));

        return back();
    }
    public function unlike()
    {
        $like = new Like;
        $user = Auth::user();
        $id = Input::only('comment_id');
        $like->where('user_id', $user->id)->where('comment_id', $id)->first()->delete();
        return Redirect::back();
    }
}
