@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => 'TopCtaController@store', 'files' => true]) !!}
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
    {!! Form::textarea('content', null, ['id' => 'summernote']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('cta_text', 'Texto do botão de ação') !!}
    {!! Form::text('cta_text', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('cta_class', 'Classe do botão de ação') !!}
    {!! Form::text('cta_class', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('cta_link', 'Link do botão') !!}
    {!! Form::text('cta_link', null, ['class' => 'form-control']) !!}
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
