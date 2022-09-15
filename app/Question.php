<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
    protected $fillable = [
        'user_id', 'category_id', 'body',
    ];
    
    //Userに対するリレーション

    //「1対多」の関係でUserは一人に決まるので単数系に
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function answers()   
    {
        return $this->hasMany('App\Answer');  
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
