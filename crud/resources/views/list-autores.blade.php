@extends('layouts.app')

@section('content')
<div class="container spark-screen">
        <div class="form-group row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="card-header">
                        Autores
                        <a class="float-right" href="{{url('autores/novo')}}">NOVO AUTOR</a>
                    </div>

                <div class="card-block">
                    <table class= "table">
                        <th>Nome</th>
                        <th>Nacionalidade</th>
                        <th>Data de nascimento</th>
                        <th>Sexo</th>
                        <th>Ações</th>
                            <tbody>
                            @foreach($autores as $autor)
                                    <tr>
                                        <td>{{$autor->nome}}</td>
                                        <td>{{$autor->nacionalidade}}</td>
                                        <td>{{$autor->ano_nascimento}}</td>
                                        <td>{{$autor->sexo}}</td>
                                        <td>
                                        <a href="autores/{{$autor->id}}/editar" class="btn btn-secondary">Editar</a>
                                        <a href="autores/{{$autor->id}}/excluir" class="btn btn-secondary">Excluir</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection