@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    </head>
    <body>
        <div class=body_content>
            <h1>-勉強や実験での疑問 共有しませんか？-</h1>
            <div class='header'>
                <div clas="search_icon">
                    <p><span class="fa-solid fa-magnifying-glass"></span><a href='questions/search'> 質問を絞り込む</a></p>
                </div>
            </div>
            <div class='questions'>
                <h2 class='index_title'>質問一覧</h2>
                @foreach ($questions as $question)
                    <div class='question'>
                        <h3 class='questioner'>{{ $question->user->name }}さん</h3>
                        <p class='body_header'>質問内容</p>
                        <p class='body'>{{ $question->body }}</p>
                        @if ($question->answers->count() == 0)
                            <p>まだ回答がありません</p>
                        @else
                            <p>{{ $question->answers->count() }}件の回答があります</p>
                        @endif
                        <a href="/questions/{{ $question->id }}">この質問の詳細へ</a>
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
