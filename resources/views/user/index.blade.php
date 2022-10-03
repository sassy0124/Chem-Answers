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
        <h2>{{ Auth::user()->name }}さんの質問一覧</h2>
        <div class='own_questions'>
            @foreach ($own_questions as $question)
                <div class='question'>
                    <p class='question_category'>分野：{{ $question->category->name }}</p>
                    <p class='body'>{{ $question->body }}</p>
                    <a href="/questions/{{ $question->id }}/user">この質問の詳細へ</a>
                </div>
            @endforeach
        </div>
        <div class="footer">
            <a href="/user">マイページへ戻る</a>
        </div>

        <div class='paginate'>
            {{ $own_questions->links() }}
        </div>
    </body>
</html>
@endsection
