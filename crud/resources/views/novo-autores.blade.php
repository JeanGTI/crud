@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="form-group row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="card-header">
                        Informe os dados do autor!
                        <a class="float-right" href="{{url('autores')}}">AUTORES CADASTRADOS</a>
                    </div>

                <div class="card-block">

                @if(Session::has('mensagem_sucesso'))
                    <div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/editar'))
                    {{ Form::model($autor, ['method'=>'PATCH','url'=>'autores'.$autor->id])}}
                @else                
                {{ Form::open(['url' => 'autores/salvar']) }}
                @endif

                    {{ Form::label('nome','Nome')}}
                    {{ Form::input('text','nome', null,['class' => 'form-control','autofocus','placeholder'=>'Nome'])}}

                    {{ Form::label('nacionalidade','Nacionalidade')}}
                    {{ Form::input('text','nacionalidade', null,['class' => 'form-control','placeholder'=>'Nacionalidade'])}}

                    {{ Form::label('ano_nascimento','Data de nascimento')}}
                    {{ Form::input('date','ano_nascimento', null,['class' => 'form-control','placeholder'=>'Data de nascimento'])}}

                    {{ Form::label('sexo','Sexo')}}
                    {{ Form::input('text','sexo', null,['class' => 'form-control','placeholder'=>'Sexo'])}}

                    {{ Form::submit('Salvar',['class'=>'btn-primary'])}}

                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection