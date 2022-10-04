@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
    </head>
    <body>
        <h1>質問検索</h1>
        <form action="/questions/index/searched" method="GET">
            @csrf
            
            <div class="body">
                <div class='category'>
                    <h3>分野選択</h3>
                    <select name="categoryId">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" value="絞り込み"/>
        </form>
        <div class="footer">
            <a href="/questions">質問一覧</a>
        </div>
    </body>
</html>
@endsection