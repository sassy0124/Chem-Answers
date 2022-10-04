@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
    </head>
    <!-- body内だけを表示しています。 -->
    <body>
        <div class='body_content'>
            <h2>質問編集</h2>
            <div class="content">
                <form action="/questions/{{ $question->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class='edit_question'>
                        <textarea name='question[body]'>{{ $question->body }}</textarea>
                    </div>
                    <input type="submit" value="保存する">
                </form>
                <div class="footer">
                    [<a href="/questions/{{ $question->id }}/user">戻る</a>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection