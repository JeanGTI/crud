@extends('layouts.app')

@section('content')
<div class="container spark-screen">
        <div class="form-group row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="card-header">
                        Livros
                        <a class="float-right" href="{{url('livros/novo')}}">NOVO LIVRO</a>
                    </div>

                <div class="card-block">
                    <table class= "table">
                    @if(Session::has('mensagem_sucesso'))
                    <div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                    @endif
                        <th>Titulo</th>
                        <th>Ano de lançamento</th>
                        <th>Autor</th>
                        <th>Genero</th>
                        <th>Editora</th>
                        <th>Ações</th>
                            <tbody>
                            @foreach($livro as $livro)
                                    <tr>
                            @foreach($livro -> autores as $autor)
                            @foreach($livro -> editoras as $editora)
                            @foreach($livro -> generos as $genero)
                                        <td>{{$livro->titulo}}</td>
                                        <td>{{$livro->ano_lancamento}}</td>  
                                        <td>{{$autor -> nome}}</td> 
                                        <td>{{$genero -> nome}}</td>
                                        <td>{{$editora -> nome }}</td>                  
                                           
                            @endforeach   
                            @endforeach 
                            @endforeach                           
                                        
                                        <td>
                                        <a href="livros/{{$livro->id}}/editar" class="btn btn-secondary">Editar</a>
                                        {{ Form::open(['method'=>'DELETE','url' => 'livros/'.$livro->id, 'style'=>'display: inline;']) }}
                                        <button type="submit" class="btn btn-secondary" >Excluir</button>
                                        {{ Form::close() }}
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