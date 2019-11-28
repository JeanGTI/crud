<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\autores;

class autoresController extends Controller
{
    public function index(){
        $autores = autores::all();
        return view('list-autores', compact('autores'));
    }
    public function create(){
        return view('include-autores');
    }
    public function store(Request $request){
        $autores = new autores;
        $autores->nome=$request->nome;
        $autores->ano_nascimento=$request->ano_nascimento;
        $autores->nacionalidade=$request->nacionalidade;
        $autores->sexo=$request->sexo;
        $autores->save();
        return redirect()->route('autores.index')->with('message','Autor criado com sucesso!');
    }
    public function show($id){
        //
    }
    public function edit($id){
        $autores = autores::findOrFail($id);
        return view('alter-autores',compact('autores'));
    }
    public function update(Request $request, $id){
        $autores= autores::finfOrFail($id);
        $autores-> nome= $request->nome;
        $autores-> ano_nascimento= $request->ano_nascimento;
        $autores-> nacionalidade= $request->nacionalidade;
        $autores-> sexo= $request->sexo;
        $autores->save();
        return redirect()->repoute('autores.index')->with('message','Autor auterado com sucesso!');
    }
    public function destroy($id){
        $autores = autores::FindeOrFail($id);
        $autores->delete();
        return redirect()->route('autores.index')->with('message','Autor excluido com sucesso!');
        }
}
