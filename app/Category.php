<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];
    
    //categoriesテーブルから::pluckでcategory_nameとidを抽出し、$categoriesに返す関数を作る
    public function getLists()
    {
        $categories = Category::pluck('name', 'id');

        return $categories;
    }
    
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
