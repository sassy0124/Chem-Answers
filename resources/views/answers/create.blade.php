@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
    </head>
    <body>
        <h1>回答投稿</h1>
        <form action="/answers" method="POST">
            @csrf
            
            <div class="body">
                <div class="question_id">
                    <input value="{{ $question->id }}" type="hidden" name="answer[question_id]" />
                </div>
                <div class="answer">
                    <h2>回答内容</h2>
                    <textarea name="answer[body]" placeholder="回答を入力してください">{{ old('answer.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('answer.body') }}</p>
                </div>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/questions">質問一覧へ</a>]</div>
    </body>
</html>
@endsection