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
        <h1 class="title">質問編集</h1>
        <div class="content">
            <form action="/questions/{{ $question->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__body'>
                    <h2>質問内容</h2>
                    <input type='text' name='question[body]' value="{{ $question->body }}">
                </div>
                <input type="submit" value="保存">
            </form>
            <div class="back">[<a href="/questions/{{ $question->id }}/user">戻る</a>]</div>
        </div>
    </body>
</html>
@endsection