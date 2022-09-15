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
        <h2>{{ Auth::user()->name }}さん</h2>
        <div class=profile>
            <h3>プロフィール</h3>
            <p>職業：{{ Auth::user()->occupation->name }}</p>
            <p>専攻：{{ Auth::user()->major->name }}</p>
        </div>
        <div class=create_question>
            <a href='/questions/create'>質問を投稿する</a>
        </div>
        <div class=index_own_questions>
            <a href='/user/questions'>自分の質問一覧</a>
        </div>
        <div class=footer>
            <a href='/questions'>質問一覧</a>
        </div>
    </body>
</html>
@endsection
