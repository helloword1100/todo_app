<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class todolist extends Controller
{
    //


    public function show(){
        return Auth::user();

    }
}
