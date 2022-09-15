@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
    </head>
    <body>
        <h1>職業作成（ルートユーザー用）</h1>
        <form action="/occupations" method="POST">
            @csrf
            
            <div class="body">
                <h2>職業入力</h2>
                <textarea name="occupation[name]" placeholder="職業名（日本語）"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>
@endsection