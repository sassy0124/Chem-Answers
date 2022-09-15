<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use App\Answer;
use App\Question;

class AnswerController extends Controller
{
    public function create(Question $question)
    {
        return view('answers/create')->with(['question' => $question]);
    }
    
        public function store(AnswerRequest $request, Answer $answer)
    {
        $input = $request['answer'];
        $input += ['user_id' => $request->user()->id];    //この行はリレーションのために追加
        $answer->fill($input)->save();
        return redirect('/questions/' . $answer->question_id);
    }
    //
}
