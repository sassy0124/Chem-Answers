@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
    </head>
    <body>
        <h1>専攻作成（ルートユーザー用）</h1>
        <form action="/majors" method="POST">
            @csrf
            
            <div class="body">
                <h2>専攻入力</h2>
                <textarea name=major[name]" placeholder="専攻名（日本語）"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>
@endsection