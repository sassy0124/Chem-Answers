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
        <h2>質問と回答</h2>
        <div class='content'>
            <div class='question'>
                <h3>質問</h3>
                <h4 class='questioner'>
                    @if($question->user->occupation_id == 4)
                        <i class="fa-solid fa-user-graduate"></i>
                    @elseif($question->user->occupation_id == 5)
                        <i class="fa-solid fa-user-tie"></i>
                    @elseif($question->user->occupation_id == 6)
                        <i class="fa-solid fa-user"></i>
                    @endif
                    {{ $question->user->name }}さん
                </h4>
                <p class='question_category'>分野：{{ $question->category->name }}</p>
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
                    <h3>回答</h3>
                    <h4 class='answerer'>
                        @if($single_answer->user->occupation_id == 4)
                            <i class="fa-solid fa-user-graduate"></i>
                        @elseif($single_answer->user->occupation_id == 5)
                            <i class="fa-solid fa-user-tie"></i>
                        @elseif($single_answer->user->occupation_id == 6)
                            <i class="fa-solid fa-user"></i>
                        @endif
                        {{ $single_answer->user->name }}さん
                    </h4>
                    <p class='body'>{{ $single_answer->body }}</p>
                    <a href="/comments/answers/{{ $single_answer->id }}">この回答にコメントする</a>
                    <div class='comment'>
                        @if($single_answer->comments->count() >= 1)
                            <h4>コメント</h4>
                        @endif
                        @foreach($single_answer->comments()->get() as $single_comment)
                            <h4 class='commenter'>
                                @if($single_comment->user->occupation_id == 4)
                                    <i class="fa-solid fa-user-graduate"></i>
                                @elseif($single_comment->user->occupation_id == 5)
                                    <i class="fa-solid fa-user-tie"></i>
                                @elseif($single_comment->user->occupation_id == 6)
                                    <i class="fa-solid fa-user"></i>
                                @endif
                                {{ $single_comment->user->name }}さん
                            </h4>
                            <p class='body'>{{ $single_comment->body }}</p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <div class="footer">
            <ul>
                <li><a href="/user/questions">自分の質問一覧</a></li>
                <li><a href="/questions">質問一覧</a></li>
                <li><a href="/user">マイページ</a></li>
            </ul>
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