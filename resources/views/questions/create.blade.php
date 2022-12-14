@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
    </head>
    <body>
        <h2>質問投稿</h2>
        <form action="/questions" method="POST">
            @csrf
            
            <div class="body">
                <div class='question_create'>
                    <textarea name="question[body]" placeholder="質問を入力してください">{{ old('question.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
                </div>
                <div class='category'>
                    <h3>分野選択</h3>
                    <select name="question[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" value="投稿する"/>
        </form>
        <div class="footer">
            <ul>
                <li><a href="/user">マイページ</a></li>
                <li><a href="/questions">質問一覧</a></li>
            </ul>
        </div>
    </body>
</html>
@endsection