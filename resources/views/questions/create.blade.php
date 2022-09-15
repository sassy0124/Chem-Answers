@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Chem Answers</title>
    </head>
    <body>
        <h1>質問投稿</h1>
        <form action="/questions" method="POST">
            @csrf
            
            <div class="body">
                <div class='question'>    
                    <h2>質問内容</h2>
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
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/questions">質問一覧へ</a>]</div>
    </body>
</html>
@endsection