@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="questionTable">
            <p>全{{ $questions->count() }}件</p>
            @foreach($questions as $question)
                <div class='question'>
                    <h3 class='questioner'>{{ $question->user->name }}さん</h3>
                    <p class='body_header'>質問内容</p>
                    <p class='body'>{{ $question->body }}</p>
                    <a href="/questions/{{ $question->id }}">この質問の詳細へ</a>
                </div>
            @endforeach
        </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
        <div class='paginate'>
            {{ $questions->links() }}
        </div>
    <!--ページネーションここまで-->
    </body>
    <div class="footer">
        <a href="/questions">質問一覧へ</a>
        <a href='/questions/search'>質問を絞り込む</a>
    <div>
</html>
@endsection