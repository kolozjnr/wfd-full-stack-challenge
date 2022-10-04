<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Referral;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->get('comment');
        

        $comment->user()->associate($request->user());
        $ref = $request->ref_id;
        $referral = Referral::find($request->get('ref_id'));
//dd($referral);
        $referral->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $referral = Referral::find($request->get('ref_id'));

        $referral->comments()->save($reply);

        return back();

    }
}
