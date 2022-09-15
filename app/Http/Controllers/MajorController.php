<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Major;

class MajorController extends Controller
{
    public function create()
    {
        return view('majors/create');
    }
    
        public function store(Request $request, Major $major)
    {
        $input = $request['major'];
        $major->fill($input)->save();
        return redirect('/major/create');
    }
}
