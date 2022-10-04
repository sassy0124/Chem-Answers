@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
        <!-- Design -->
        <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    </head>
    <body>
        <div class=body_content>
            <h3>-その疑問 一緒に解決しませんか？-</h3>
            <div class='explaination'>
                <ul>
                    <li>Chem Answersは<span class='adding_color_1'>化学</span>に関する質問を共有し合うサイトです。実験や勉強中に疑問に感じたことをみんなで解決しましょう！</li>
                    <li>・質問する：ログイン➝(右上のユーザータグから)マイページ➝質問を投稿する</li>
                    <li>・回答する：ログイン➝この質問の詳細へ➝この質問に回答する</li>
                    <li>・アイコン説明　教員：<i class="fa-solid fa-user-graduate"></i>　学生：<i class="fa-solid fa-user-tie"></i>　その他：<i class="fa-solid fa-user"></i></li>
                </ul>
            </div>
            <div class='header'>
                <div clas="search_icon">
                    <p><span class="fa-solid fa-magnifying-glass"></span><a href='questions/search'> 質問を絞り込む</a></p>
                </div>
            </div>
            <div class='questions'>
                <h2 class='index_title'>質問一覧</h2>
                @foreach ($questions as $question)
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
            <div class='paginate'>
                {{ $questions->links() }}
            </div>
        </div>
    </body>
</html>
@endsection
