<div id="{!! $page->anchor !!}"
            style="
            background: 
            {!! $page->bg_color !!} 
            url({{ url('storage/'.$page->bg_image) }}) 
            no-repeat 
            @if($page->fixed == 1)
            fixed
            @endif
            right 
            top;
            background-size:
            cover;">
            @if($page->logo == 1 && $page->whats == 1)
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        @if($page->logo == 1)
                            @if($prefs->logo != '')
                                <img src="{{asset('img/logo-sr.png')}}" class="" style="width:150px;height:auto" alt="">
                            @else
                                <h2 class="text-primary">{!! $prefs->sitename !!}</h2>
                            @endif    
                        @endif
                    </div>
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-4 text-center py-5">
                        @if($page->whats == 1)
                        <a class="btn btn-success" href="https://api.whatsapp.com/send?phone={!! $prefs->whatsapp !!}" target="_blank" role="button">Clique aqui para falar via Whatsapp</a>
                        
                        @endif
                    </div>
                </div>
            </div>
            @endif
            <div class="d-flex align-items-center bd-highlight" style="height: 100vh;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            {!! $page->content !!}
                        </div>
                        <div class="col-sm-4 p-3 rounded shadow" style="background-color:{!!$page->form_color!!}">
                            {!! $page->form_title !!}
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            {!! Form::open(['url' => 'formgo']) !!}
                            {!! Form::hidden('form_id', $page->id) !!}
                            <div class="form-group">
                            {!! Form::text('nome', null, ['class' => "form-control", 'placeholder' => 'Seu nome']) !!}
                            @error('nome')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="form-group">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Seu e-mail']) !!}
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="form-group">
                            {!! Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => 'Seu telefone']) !!}
                            @error('telefone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="form-group">
                            @error('mensagem')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            {!! Form::textarea('mensagem', null, ['rows'=> 4, 'class' => 'form-control', 'placeholder' => 'Deixe sua mensagem']) !!}
                            </div>
                            <div class="form-group">
                            {!! Form::submit('Enviar mensagem!', ['class' => 'btn btn-'.$page->btn_class.' btn-block']) !!}
                            </div>    
                        {!! Form::close() !!}
                        </div>
                    </div>                    
                </div>    
            </div>
        </div>