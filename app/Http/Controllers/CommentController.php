<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create($episode,Comment $comment,Request $request){
        //run validation here
        //
        return "true";
    }
}
