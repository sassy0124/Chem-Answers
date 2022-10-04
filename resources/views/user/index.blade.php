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
        <h2 class='index_title'>{{ Auth::user()->name }}さんの質問一覧</h2>
        <div class='own_questions'>
            @foreach ($own_questions as $question)
                <div class='index_question'>
                    <p class='question_category'>分野：{{ $question->category->name }}</p>
                    <p class='question_body'>{{ $question->body }}</p>
                    @if ($question->answers->count() == 0)
                        <p class='count_answer'>まだ回答がありません</p>
                    @else
                        <p class='count_answer'>{{ $question->answers->count() }}件の回答があります</p>
                    @endif
                    <a class='to_show' href="/questions/{{ $question->id }}/user">この質問の詳細へ</a>
                </div>
            @endforeach
        </div>
        <div class="footer">
            <ul>
                <li><a href="/user">マイページ</a></li>
                <li><a href="/questions">質問一覧</a></li>
            </ul>
        </div>

        <div class='paginate'>
            {{ $own_questions->links() }}
        </div>
    </body>
</html>
@endsection
