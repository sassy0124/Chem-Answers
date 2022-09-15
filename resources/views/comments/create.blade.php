@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
    </head>
    <body>
        <h1>コメント投稿</h1>
        <form action="/comments" method="POST">
            @csrf
            
            <div class="body">
                <div class="answer_id">
                    <input value="{{ $answer->id }}" type="hidden" name="comment[answer_id]" />
                </div>
                <div class="comment">
                    <h2>コメント内容</h2>
                    <textarea name="comment[body]" placeholder="コメントを入力してください">{{ old('comment.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                </div>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/questions">質問一覧へ</a>]</div>
    </body>
</html>
@endsection