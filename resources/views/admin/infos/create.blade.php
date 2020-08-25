@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => 'InfosController@store', 'files' => true]) !!}
    <div class="form-group">
    {!! Form::label('anchor', 'Âncora') !!}
    {!! Form::text('anchor', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('image', 'Imagem') !!}
    {!! Form::file('image', ['class' => 'form-control-file']) !!}
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
    {!! Form::label('side', 'Disposição da imagem') !!}
    {!! Form::select('side', ['L' => 'Imagem à esquerda', 'R' => 'Imagem à direita'], ['class' => 'form-control']) !!}
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
