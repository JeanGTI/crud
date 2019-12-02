@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="form-group row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="card-header">
                        Informe os dados da editora!
                        <a class="float-right" href="{{url('editoras')}}">EDITORAS CADASTRADAS</a>
                    </div>

                <div class="card-block">

                @if(Session::has('mensagem_sucesso'))
                    <div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                @endif              

                @if(Request::is('*/editar'))
                    {{ Form::model($editora, ['method'=>'PATCH','url'=>'editoras/'.$editora->id])}}
                @else                
                {{ Form::open(['url' => 'editoras/salvar']) }}
                @endif

                    {{ Form::label('nome','Nome')}}
                    {{ Form::input('text','nome', null,['class' => 'form-control','autofocus','placeholder'=>'Nome'])}}

                    {{ Form::submit('Salvar',['class'=>'btn-primary'])}}

                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection