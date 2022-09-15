<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occupation;

class OccupationController extends Controller
{
    public function create()
    {
        return view('occupations/create');
    }
    
        public function store(Request $request, Occupation $occupation)
    {
        $input = $request['occupation'];
        $occupation->fill($input)->save();
        return redirect('/occupation/create');
    }
}
