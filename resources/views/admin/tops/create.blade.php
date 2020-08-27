@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => 'TopController@store', 'files' => true]) !!}
    <div class="form-group form-check">
    {!! Form::label('logo', 'Exibir logo?') !!}
    {!! Form::checkbox('logo', '1', ['class' => 'form-check-input']) !!}
    </div>
    <div class="form-group form-check">
    {!! Form::label('whats', 'Exibir botão Whatsapp?') !!}
    {!! Form::checkbox('whats', '1', ['class' => 'form-check-input']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('bg_image', 'Imagem de fundo') !!}
    {!! Form::file('bg_image', ['class' => 'form-control-file']) !!}
    </div>
    <div class="form-group form-check">
    {!! Form::label('sticked', 'Top fixo?') !!}
    {!! Form::checkbox('sticked', '1', ['class' => 'form-check-input']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('bg_color', 'Cor de fundo') !!}
    {!! Form::color('bg_color', '#ffffff', ['class' => 'form-input']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('content', 'Texto') !!}
    {!! Form::textarea('content', null, ['id' => 'summernote']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('bt_whats', 'Texto do botão de whatsapp') !!}
    {!! Form::text('bt_whats', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Salvar') !!}
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
    {!! Form::close() !!}
</div>
@endsection
