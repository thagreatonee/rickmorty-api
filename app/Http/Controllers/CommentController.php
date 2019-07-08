<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Validator;

class CommentController extends Controller
{
    /**
     * @param $episode
     * @param Comment $comment
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function create($episode, Comment $comment, Request $request)
    {
        $requestList    = $request->all();
        $validation     = Validator::make($requestList, [
            'comment' => 'required|max:500'
        ]);

        //check for validation errors here
        if ($validation->fails()) {
            $errors = $validation->errors();
            return response($errors->toJson(), 500);
        }

        $record =  $comment->create([
            'ip'            => $request->getClientIp(true),
            'comment'       => $requestList['comment'],
            'episode_id'    => $episode,
        ]);

        if ($record) {
            return response(['message'=>'Comment added'], 200);
        }

        //return validation
        return response(['message'=>'Comment not added'], 500);
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $comments = $comment->all();
        if ($comments) {
            return response($comments, 200);
        }

        return response("Failed to retrieve comments", 500);
    }

    /**
     * @param $episode
     * @param Comment $comment
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function view($episode, Comment $comment)
    {
        $comments = Comment::where('episode_id', $episode)->get();

        if ($comments) {
            return response($comments, 200);
        }
        return response('Failed to retrieve comments for this episode', 500);
    }
}
