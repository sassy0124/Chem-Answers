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
        <h1>質問と回答</h1>
        <div class='content'>
            <div class='question'>
                <h2>質問</h2>
                <h3 class='questioner'>{{ $question->user->name }}さん</h3>
                <h4 class='category'>分野：{{ $question->category->name }}</h4>
                <p class='body'>{{ $question->body }}</p>
                <a href="/questions/{{ $question->id }}/edit">質問を編集する</a>
                <p class='delete'>
                    <form action="/questions/{{ $question->id }}" id="form_delete" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" id=btn>削除する</button>
                    </form>
                </p>
            </div>
            <div class='answer'>
                @foreach($question->answers()->orderBy('id', 'desc')->get() as $single_answer)
                    <h2>回答</h2>
                    <h3 class='answerer'>{{ $single_answer->user->name }}さん</h3>
                    <p class='body'>{{ $single_answer->body }}</p>
                    <a href="/comments/answers/{{ $single_answer->id }}">この回答にコメントする</a>
                    <div class='comment'>
                        <h2>コメント</h2>
                        @foreach($single_answer->comments()->get() as $single_comment)
                            <h3 class='commenter'>{{ $single_comment->user->name }}さん</h3>
                            <p class='body'>{{ $single_comment->body }}</p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <div class="footer">
            <p>
                <a href="/user/questions">自分の質問一覧</a>
            </p>
            <p>
                <a href="/user">マイページ</a>
            </p>
        </div>
        <script>
            var btn = document.getElementById('btn');
            
            btn.addEventListener("click", function deletePost(){
                var result = window.confirm('削除すると復元できません。\n本当に削除しますか？');
                
                if(result){
                    document.getElementById('form_delete').submit();
                }else{
                    alert('削除をキャンセルしました')
                }
            })
        </script>
    </body>
</html>
@endsection