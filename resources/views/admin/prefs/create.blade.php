@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => 'PrefsController@store', 'files' => true]) !!}
    <div class="form-group">
    {!! Form::label('sitename', 'Nome do Site') !!}
    {!! Form::text('sitename', (!is_null($prefs)) ? $prefs->sitename : null , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    @if(!is_null($prefs))
        @if($prefs->logo != '')
            <img src="{{ url('storage/'.$prefs->logo) }}" style="width:200px;height:auto;" class="img-thumbnail" />
        @else
            <img src="{{ asset('img/placeholder-16-9.jpg') }}" style="width:200px;height:auto;" class="img-thumbnail" />
        @endif
    @else
        <img src="{{ asset('img/placeholder-16-9.jpg') }}" style="width:200px;height:auto;" class="img-thumbnail" />
    @endif
    </div>
    <div class="form-group">
    {!! Form::label('logo', 'Logo') !!}
    {!! Form::file('logo', (!is_null($prefs)) ? $prefs->logo : null, ['class' => 'form-control-file']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('whatsapp', 'Whatsapp') !!}
    {!! Form::text('whatsapp', (!is_null($prefs)) ? $prefs->whatsapp : null , ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Salvar') !!}
</div>
@endsection
