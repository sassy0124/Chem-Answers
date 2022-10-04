@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
    </head>
    <body>
        <h2>コメント投稿</h2>
        <form action="/comments" method="POST">
            @csrf
            
            <div class="body">
                <div class="comment_create">
                    <div class="answer_id">
                        <input value="{{ $answer->id }}" type="hidden" name="comment[answer_id]" />
                    </div>
                    <div>
                        <textarea name="comment[body]" placeholder="コメントを入力してください">{{ old('comment.body') }}</textarea>
                        <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                    </div>
                </div>
            </div>
            <input type="submit" value="投稿する"/>
        </form>
        <div class="footer">
            <a href="/questions">質問一覧</a>
        </div>
    </body>
</html>
@endsection