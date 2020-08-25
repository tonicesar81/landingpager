@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => 'FormsController@store', 'files' => true]) !!}
    <div class="form-group">
    {!! Form::label('anchor', 'Âncora') !!}
    {!! Form::text('anchor', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('bt_class', 'Classe do botão') !!}
    {!! Form::text('bt_class', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('bg_color', 'Cor de fundo') !!}
    {!! Form::color('bg_color', '#ffffff', ['class' => 'form-input']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('content', 'Texto') !!}
    {!! Form::textarea('content', null, ['id' => 'summernote']) !!}
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
