<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user/index')->with(['own_questions' => $user->getOwnPaginateByLimit()]);
    }
    
    public function introduce()
    {
        return view('user/introduce');//->with(['own_occupation' => \Auth::user()->occupation_id]);
    }
}
