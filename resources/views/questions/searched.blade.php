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
        <div class="questions">
            <h4>全{{ $questions->count() }}件あります</h4>
            @foreach($questions as $question)
                <div class='index_question'>
                    <h3 class='questioner'>
                        @if($question->user->occupation_id == 1)
                            <i class="fa-solid fa-user-graduate"></i>
                        @elseif($question->user->occupation_id == 2)
                            <i class="fa-solid fa-user-tie"></i>
                        @elseif($question->user->occupation_id == 3)
                            <i class="fa-solid fa-user"></i>
                        @endif
                        {{ $question->user->name }}さん
                    </h3>
                    <p class='question_category'>分野：{{ $question->category->name }}</p>
                    <p class='question_body'>{{ $question->body }}</p>
                    @if ($question->answers->count() == 0)
                        <p class='count_answer'>まだ回答がありません</p>
                    @else
                        <p class='count_answer'>{{ $question->answers->count() }}件の回答があります</p>
                    @endif
                    <a class='to_show' href="/questions/{{ $question->id }}">この質問の詳細へ</a>
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
        <ul>
            <li><a href="/questions">質問一覧</a></li>
            <li><a href='/questions/search'>質問を絞り込む</a></li>
        </ul>
    </div>
</html>
@endsection