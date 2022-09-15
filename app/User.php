<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    
    public function getOwnPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('questions')->find(Auth::id())->questions()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'age', 'sex', 'occupation_id', 'major_id', /*'point',*/ 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //Questionに対するリレーション

    //「1対多」の関係なので'questions'と複数形に
    public function questions()   
    {
        return $this->hasMany('App\Question');  
    }
    
    public function answers()   
    {
        return $this->hasMany('App\Answer');  
    }
    
    public function comments()   
    {
        return $this->hasMany('App\Comment');  
    }
    
    //Occupationに対するリレーション

    //「1対多」の関係でOccupationrは一つに決まるので単数系に
    public function occupation()
    {
        return $this->belongsTo('App\Occupation');
    }
    
    public function major()
    {
        return $this->belongsTo('App\Major');
    }
}
