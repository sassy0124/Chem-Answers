<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $fillable = [
        'name',
    ];
    
    //Userに対するリレーション

    //「1対多」の関係なので'users'と複数形に
    public function users()   
    {
        return $this->hasMany('App\User');  
    }
    //
}
