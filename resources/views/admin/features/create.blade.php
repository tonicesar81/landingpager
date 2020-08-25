@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => 'FeatController@store', 'files' => true]) !!}
    <div class="form-group">
    {!! Form::label('anchor', 'Âncora') !!}
    {!! Form::text('anchor', null, ['class' => 'form-control']) !!}
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
    <hr />
    <div id="features">

    </div>
    {!! Form::button('Nova feature', ['id' => 'bt_feature']) !!}
    {!! Form::submit('Salvar') !!}
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
        $( "#bt_feature" ).click(function() {
            $("#features").append('{!! Form::hidden("f_id[]", "1") !!}');
            $("#features").append('<div class="form-group">{!! Form::label("image", "Imagem") !!}{!! Form::file("image[]", ["class" => "form-control-file"]) !!}</div>');
            $("#features").append('<div class="form-group">{!! Form::label("content", "Texto") !!}{!! Form::textarea("f_content[]", null, ["class" => "summer"]) !!}</div>');
            $('.summer').summernote();
            $("#features").append('<div class="form-group">{!! Form::label("bg_color", "Cor de fundo") !!}{!! Form::color("f_color[]", "#ffffff", ["class" => "form-input"]) !!}</div>');
            $("#features").append('<hr />');
        });
    </script>
    {!! Form::close() !!}
</div>
@endsection
