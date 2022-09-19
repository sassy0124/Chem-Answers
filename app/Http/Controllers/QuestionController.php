<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Answer;
use App\Category;
use App\Question;

class QuestionController extends Controller
{
    public function index(Question $question)
    {
        return view('questions/index')->with(['questions' => $question->getPaginateByLimit()]);
    }
    
    public function search(Category $category)
    {
        return view('questions/search')->with(['categories' => $category->get()]);
    }
    
    public function searched(Request $request)
    {
        //入力される値nameの中身を定義する
        $categoryId = $request->input('categoryId'); //カテゴリの値
        
        $query = Question::query();
        //categoriesテーブルからcategory_idが一致する商品を$queryに代入
        $query->where('category_id', $categoryId);

        //$queryをcategory_idを降順に並び替えて$questionsに代入
        $questions = $query->orderBy('id', 'DESC')->paginate(10);

        //categoriesテーブルからgetLists();関数でnameとidを取得する
        $category = new Category;
        $categories = $category->getLists();

        return view('questions/searched', [
            'questions' => $questions,
            'categories' => $categories,
            'category_id' => $categoryId
        ]);
    }
    
    public function create(Category $category)
    {
        return view('questions/create')->with(['categories' => $category->get()]);
    }
    
    /**   
     * 特定IDのpostを表示する
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view 
     */
    public function show(Question $question)
    {
        return view('questions/show')->with(['question' => $question]);
    }
    
    public function detail(Question $question)
    {
        return view('questions/detail')->with(['question' => $question]);
    }
    
    public function edit(Question $question)
    {
        return view('questions/edit')->with(['question' => $question]);
    }

    public function store(QuestionRequest $request, Question $question)
    {
        $input = $request['question'];
        $input += ['user_id' => $request->user()->id];    //この行はリレーションのために追加
        $question->fill($input)->save();
        return redirect('/questions/' . $question->id . '/user');
    }
    
    public function update(QuestionRequest $request, Question $question)
    {
        $input_question = $request['question'];
        $input_question += ['user_id' => $request->user()->id];    //この行はリレーションのために追加
        $question->fill($input_question)->save();
        return redirect('/questions/'. $question->id);
    }
    
    public function delete(Question $question)
    {
        $question->delete();
        return redirect('/user/questions');
    }
}
