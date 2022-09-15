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
        <h1>Chem Answers</h1>
        <div class=to_mypage>
            <a href='user'>マイページ</a>
        </div>
        <h2>質問一覧</h2>
        <div class='questions'>
            @foreach ($questions as $question)
                <div class='question'>
                    <h3 class='questioner'>{{ $question->user->name }}さん</h3>
                    <p class='body_header'>質問内容</p>
                    <p class='body'>{{ $question->body }}</p>
                    <a href="/questions/{{ $question->id }}">この質問の詳細へ</a>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $questions->links() }}
        </div>
    </body>
</html>
@endsection
