<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\autores;

class autoresController extends Controller
{
    public function index(){
        $autores = autores::all();
        $total = autores::all()->count();
        return view('list-autores', compact('produtos','total'));
    }
    public function create(){
        return view('include-produto')
    }
}
