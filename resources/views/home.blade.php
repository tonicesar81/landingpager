@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-4">
                            Cliques no botão Whatsapp: {{ $prefs->wpp_clicks }}
                        </div>
                        <div class="col-sm-4">
                            Emails enviados: <a href="{!! url('mails') !!}">{{ $mails->count() }}</a>
                        </div>
                    </div>
                    @foreach($modules as $mod)
                        @switch($mod->module)
                            @case('top')
                                {!! Form::open(['action' => ['TopController@update', $mod->id], 'method' => 'put', 'files' => true]) !!}
                                <div class="form-row {!! ($mod->enabled != 1) ? 'bg-light' : '' !!} border border-dark p-1 my-3">
                                    <div class="form-group col-sm-12 bg-info">
                                        <h3>Top</h3>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('enabled', 'Ativo') !!}
                                        {!! Form::checkbox('enabled', '1', ($mod->enabled == 1) ? true : false) !!}
                                    </div>    
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('logo', 'Mostrar logo?') !!}
                                        {!! Form::checkbox('logo', '1', ($mod->logo == 1) ? true : false) !!}
                                        {!! Form::label('whats', 'Mostrar Whatsapp?') !!}
                                        {!! Form::checkbox('whats', '1', ($mod->whats == 1) ? true : false) !!}  
                                        {!! Form::label('sticked', 'Topo Fixo?') !!}
                                        {!! Form::checkbox('sticked', '1', ($mod->sticked == 1) ? true : false) !!}                                     
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('bg_color', 'Cor de fundo') !!}
                                        {!! Form::color('bg_color', $mod->bg_color, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('bg_image', 'Imagem de fundo') !!}
                                        {!! Form::file('bg_image', ['class' => 'form-control-file']) !!}
                                    </div>
                                    <div class="form-group col-sm-10">
                                        {!! Form::label('content', 'Texto') !!}
                                        {!! Form::textarea('content', $mod->content, ['class' => 'summernote']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('cta_text', 'Texto do Botão Whatsapp') !!}
                                        {!! Form::text('cta_text', $mod->bt_whats, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('order', 'Ordem') !!}
                                        {!! Form::number('order', $mod->order, ['class' => 'form-control']) !!}                                       
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::checkbox('delete', '1', false) !!}
                                        {!! Form::label('delete', 'Apagar módulo (Irreversível)') !!}
                                        {!! Form::submit('Salvar') !!}
                                    </div>
                                </div>                                
                                {!! Form::close() !!}
                            @break
                            @case('cta')
                                {!! Form::open(['action' => ['TopCtaController@update', $mod->id], 'method' => 'put', 'files' => true]) !!}
                                <div class="form-row {!! ($mod->enabled != 1) ? 'bg-light' : '' !!} border border-dark p-1 my-3">
                                    <div class="form-group col-sm-12 bg-info">
                                        <h3>Top - Call to Action (CTA)</h3>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('enabled', 'Ativo') !!}
                                        {!! Form::checkbox('enabled', '1', ($mod->enabled == 1) ? true : false) !!}
                                    </div>    
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('logo', 'Mostrar logo?') !!}
                                        {!! Form::checkbox('logo', '1', ($mod->logo == 1) ? true : false) !!}
                                        {!! Form::label('whats', 'Mostrar Whatsapp?') !!}
                                        {!! Form::checkbox('whats', '1', ($mod->whats == 1) ? true : false) !!}                                       
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('anchor', 'Âncora') !!}
                                        {!! Form::text('anchor', $mod->anchor, ['class' => 'form-control']) !!}                                     
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('bg_color', 'Cor de fundo') !!}
                                        {!! Form::color('bg_color', $mod->bg_color, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <img src="{{ url('storage/'.$mod->bg_image) }}" style="width:200px;height:auto;" class="img-thumbnail" />
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('bg_image', 'Imagem de fundo') !!}
                                        {!! Form::file('bg_image', ['class' => 'form-control-file']) !!}
                                        <div class="form-group form-check">
                                        {!! Form::label('fixed', 'Imagem fixa') !!}
                                        {!! Form::checkbox('fixed', '1', ($mod->fixed == 1) ? true : false) !!}
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-10">
                                        {!! Form::label('content', 'Texto') !!}
                                        {!! Form::textarea('content', $mod->content, ['class' => 'summernote']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('cta_text', 'Texto do CTA') !!}
                                        {!! Form::text('cta_text', $mod->cta_text, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('cta_class', 'Classe do botão') !!}
                                        {!! Form::text('cta_class', $mod->cta_class, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('cta_link', 'Link do botão') !!}
                                        {!! Form::text('cta_link', $mod->cta_link, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('order', 'Ordem') !!}
                                        {!! Form::number('order', $mod->order, ['class' => 'form-control']) !!}                                       
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::checkbox('delete', '1', false) !!}
                                        {!! Form::label('delete', 'Apagar módulo (Irreversível)') !!}
                                        {!! Form::submit('Salvar') !!}
                                    </div>
                                </div>                                
                                {!! Form::close() !!}
                            @break
                            @case('topform')
                                {!! Form::open(['action' => ['TopFormsController@update', $mod->id], 'method' => 'put', 'files' => true]) !!}
                                <div class="form-row {!! ($mod->enabled != 1) ? 'bg-light' : '' !!} border border-dark p-1 my-3">
                                    <div class="form-group col-sm-12 bg-info">
                                        <h3>Top - Form</h3>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('enabled', 'Ativo') !!}
                                        {!! Form::checkbox('enabled', '1', ($mod->enabled == 1) ? true : false) !!}
                                    </div>    
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('logo', 'Mostrar logo?') !!}
                                        {!! Form::checkbox('logo', '1', ($mod->logo == 1) ? true : false) !!}
                                        {!! Form::label('whats', 'Mostrar Whatsapp?') !!}
                                        {!! Form::checkbox('whats', '1', ($mod->whats == 1) ? true : false) !!}                                       
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('anchor', 'Âncora') !!}
                                        {!! Form::text('anchor', $mod->anchor, ['class' => 'form-control']) !!}                                     
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('bg_color', 'Cor de fundo') !!}
                                        {!! Form::color('bg_color', $mod->bg_color, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <img src="{{ url('storage/'.$mod->bg_image) }}" style="width:200px;height:auto;" class="img-thumbnail" />
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('bg_image', 'Imagem de fundo') !!}
                                        {!! Form::file('bg_image', ['class' => 'form-control-file']) !!}
                                        <div class="form-group form-check">
                                        {!! Form::label('fixed', 'Imagem fixa') !!}
                                        {!! Form::checkbox('fixed', '1', ($mod->fixed == 1) ? true : false) !!}
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-10">
                                        {!! Form::label('content', 'Texto') !!}
                                        {!! Form::textarea('content', $mod->content, ['class' => 'summernote']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('email', 'Email de destino') !!}
                                        {!! Form::text('email', $mod->email, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('btn_class', 'Classe do botão') !!}
                                        {!! Form::text('btn_class', $mod->btn_class, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-10">
                                        {!! Form::label('form_title', 'Título do form') !!}
                                        {!! Form::textarea('form_title', $mod->form_title, ['class' => 'summernote']) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('form_color', 'Cor do form') !!}
                                        {!! Form::color('form_color', $mod->form_color, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('order', 'Ordem') !!}
                                        {!! Form::number('order', $mod->order, ['class' => 'form-control']) !!}                                       
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::checkbox('delete', '1', false) !!}
                                        {!! Form::label('delete', 'Apagar módulo (Irreversível)') !!}
                                        {!! Form::submit('Salvar') !!}
                                    </div>
                                </div>                                
                                {!! Form::close() !!}
                            @break
                            @case('feature')
                                {!! Form::open(['action' => ['FeatController@update', $mod->id], 'method' => 'put', 'files' => true]) !!}
                                <div class="form-row {!! ($mod->enabled != 1) ? 'bg-light' : '' !!} border border-dark p-1 my-3">
                                    <div class="form-group col-sm-12 bg-info">
                                        <h3>Features</h3>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('enabled', 'Ativo') !!}
                                        {!! Form::checkbox('enabled', '1', ($mod->enabled == 1) ? true : false) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('anchor', 'Âncora') !!}
                                        {!! Form::text('anchor', $mod->anchor, ['class' => 'form-control']) !!}                                     
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('bg_color', 'Cor de fundo') !!}
                                        {!! Form::color('bg_color', $mod->bg_color, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        @if($mod->bg_image != '')
                                        <img src="{{ url('storage/'.$mod->bg_image) }}" style="width:200px;height:auto;" class="img-thumbnail" />
                                        @else
                                        <img src="{{ asset('img/placeholder-16-9.jpg') }}" style="width:200px;height:auto;" class="img-thumbnail" />
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('bg_image', 'Imagem de fundo') !!}
                                        {!! Form::file('bg_image', ['class' => 'form-control-file']) !!}
                                        <div class="form-group form-check">
                                        {!! Form::label('fixed', 'Imagem fixa') !!}
                                        {!! Form::checkbox('fixed', '1', ($mod->fixed == 1) ? true : false) !!}
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-10">
                                        {!! Form::label('content', 'Texto') !!}
                                        {!! Form::textarea('content', $mod->content, ['class' => 'summernote']) !!}
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <hr />
                                    </div>
                                    <div id="features_{{$mod->id}}" class="row">
                                    @foreach($mod->item as $features)
                                        <div class="form-group col-sm-2">
                                            @if($features->image != '')
                                            <img src="{{ url('storage/'.$features->image) }}" style="width:200px;height:auto;" class="img-thumbnail" />
                                            @else
                                            <img src="{{ asset('img/placeholder-16-9.jpg') }}" style="width:200px;height:auto;" class="img-thumbnail" />
                                            @endif
                                        </div>
                                        <div class="form-group col-sm-3">
                                            {!! Form::hidden("f_id[]", $features->id) !!}
                                            {!! Form::label("image", "Imagem") !!}
                                            {!! Form::file("image[]", ["class" => "form-control-file"]) !!}
                                        </div>
                                        <div class="form-group col-sm-5">
                                            {!! Form::label("content", "Texto") !!}
                                            {!! Form::textarea("f_content[]", $features->content, ["class" => "summernote"]) !!}
                                        </div>
                                        <div class="form-group col-sm-2">
                                            {!! Form::label('bg_color', 'Cor de fundo') !!}
                                            {!! Form::color('f_color[]', $features->bg_color, ['class' => 'form-control']) !!}
                                        </div>
                                    @endforeach
                                        
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <hr />
                                        {!! Form::button('Nova feature', ['class' => 'bt_feature', 'onClick' => 'newFeature('.$mod->id.')']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('order', 'Ordem') !!}
                                        {!! Form::number('order', $mod->order, ['class' => 'form-control']) !!}                                       
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::checkbox('delete', '1', false) !!}
                                        {!! Form::label('delete', 'Apagar módulo (Irreversível)') !!}
                                        
                                        {!! Form::submit('Salvar') !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @break
                            @case('form')
                                {!! Form::open(['action' => ['FormsController@update', $mod->id], 'method' => 'put', 'files' => true]) !!}
                                <div class="form-row {!! ($mod->enabled != 1) ? 'bg-light' : '' !!} border border-dark p-1 my-3">
                                    <div class="form-group col-sm-12 bg-info">
                                        <h3>Formulários de contato</h3>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('enabled', 'Ativo') !!}
                                        {!! Form::checkbox('enabled', '1', ($mod->enabled == 1) ? true : false) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('anchor', 'Âncora') !!}
                                        {!! Form::text('anchor', $mod->anchor, ['class' => 'form-control']) !!}                                     
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('email', 'E-mail de destino') !!}
                                        {!! Form::email('email', $mod->email, ['class' => 'form-control']) !!}                                     
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('bt_class', 'Classe do botão') !!}
                                        {!! Form::text('bt_class', $mod->bt_class, ['class' => 'form-control']) !!}                                     
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('bg_color', 'Cor de fundo') !!}
                                        {!! Form::color('bg_color', $mod->bg_color, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('order', 'Ordem') !!}
                                        {!! Form::number('order', $mod->order, ['class' => 'form-control']) !!}                                       
                                    </div>
                                    <div class="form-group col-sm-10">
                                        {!! Form::label('content', 'Texto') !!}
                                        {!! Form::textarea('content', $mod->content, ['class' => 'summernote']) !!}
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::checkbox('delete', '1', false) !!}
                                        {!! Form::label('delete', 'Apagar módulo (Irreversível)') !!}
                                        {!! Form::submit('Salvar') !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @break
                            @case('info')
                                {!! Form::open(['action' => ['InfosController@update', $mod->id], 'method' => 'put', 'files' => true]) !!}
                                <div class="form-row {!! ($mod->enabled != 1) ? 'bg-light' : '' !!} border border-dark p-1 my-3">
                                    <div class="form-group col-sm-12 bg-info">
                                        <h3>Infos</h3>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('enabled', 'Ativo') !!}
                                        {!! Form::checkbox('enabled', '1', ($mod->enabled == 1) ? true : false) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('anchor', 'Âncora') !!}
                                        {!! Form::text('anchor', $mod->anchor, ['class' => 'form-control']) !!}                                     
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('bg_color', 'Cor de fundo') !!}
                                        {!! Form::color('bg_color', $mod->bg_color, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('side', 'Disposição da imagem') !!}
                                        {!! Form::select('side', ['L' => 'Imagem à esquerda', 'R' => 'Imagem à direita'], $mod->side, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        @if($mod->image != '')
                                        <img src="{{ url('storage/'.$mod->image) }}" style="width:200px;height:auto;" class="img-thumbnail" />
                                        @else
                                        <img src="{{ asset('img/placeholder-16-9.jpg') }}" style="width:200px;height:auto;" class="img-thumbnail" />
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('image', 'Imagem') !!}
                                        {!! Form::file('image', ['class' => 'form-control-file']) !!}
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('content', 'Texto') !!}
                                        {!! Form::textarea('content', $mod->content, ['class' => 'summernote']) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('order', 'Ordem') !!}
                                        {!! Form::number('order', $mod->order, ['class' => 'form-control']) !!}                                       
                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::checkbox('delete', '1', false) !!}
                                        {!! Form::label('delete', 'Apagar módulo (Irreversível)') !!}
                                        
                                        {!! Form::submit('Salvar') !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @break
                        @endswitch
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
    function newFeature(id){
        $("#features_"+id).append('<div class="form-group col-sm-2">{!! Form::hidden("f_id[]", "n") !!}</div>');
        $("#features_"+id).append('<div class="form-group col-sm-3">{!! Form::label("image", "Imagem") !!}{!! Form::file("image[]", ["class" => "form-control-file"]) !!}</div>');
        $("#features_"+id).append('<div class="form-group col-sm-5">{!! Form::label("content", "Texto") !!}{!! Form::textarea("f_content[]", null, ["class" => "summernote"]) !!}</div>');
        $('.summernote').summernote();
        $("#features_"+id).append('<div class="form-group col-sm-2">{!! Form::label("bg_color", "Cor de fundo") !!}{!! Form::color("f_color[]", "#ffffff", ["class" => "form-control"]) !!}</div>');
        $("#features_"+id).append('<hr />');
    }
</script>
@endsection
