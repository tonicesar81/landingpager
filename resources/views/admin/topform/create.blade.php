@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => 'TopFormsController@store', 'files' => true]) !!}
    <div class="form-group">
    {!! Form::label('anchor', 'Âncora') !!}
    {!! Form::text('anchor', null, ['class' => 'form-control']) !!}
    </div>
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
    {!! Form::label('fixed', 'Imagem fixa') !!}
    {!! Form::checkbox('fixed', '1', ['class' => 'form-check-input']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('bg_color', 'Cor de fundo') !!}
    {!! Form::color('bg_color', '#ffffff', ['class' => 'form-input']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('content', 'Texto') !!}
    {!! Form::textarea('content', null, ['class' => 'summernote']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('email', 'E-mail para contato') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('btn_class', 'Classe do botão') !!}
    {!! Form::text('btn_class', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('form_title', 'Título do Form') !!}
    {!! Form::textarea('form_title', null, ['class' => 'summernote']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('form_color', 'Cor do Form') !!}
    {!! Form::color('form_color', '#ffffff', ['class' => 'form-input']) !!}
    </div>
    {!! Form::submit('Salvar') !!}
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
    {!! Form::close() !!}
</div>
@endsection
