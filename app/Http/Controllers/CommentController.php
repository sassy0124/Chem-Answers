<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Answer;
use App\Comment;

class CommentController extends Controller
{
    public function create(Answer $answer)
    {
        return view('comments/create')->with(['answer' => $answer]);
    }
    
        public function store(CommentRequest $request, Comment $comment)
    {
        $input = $request['comment'];
        $input += ['user_id' => $request->user()->id];    //この行はリレーションのために追加
        $comment->fill($input)->save();
        return redirect('/questions/' . $comment->answer->question_id);
    }
    //
}
