<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NgController extends Controller
{
    public function index(){

        return view('ng.index');
    }
}
