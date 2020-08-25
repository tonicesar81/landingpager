<div id="{!! $page->anchor !!}" class="d-flex align-items-center bd-highlight clearfix" style="background: {!! $page->bg_color !!}">
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-6">
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
                        {!! Form::textarea('mensagem', null, ['class' => 'form-control', 'placeholder' => 'Deixe sua mensagem']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::submit('Enviar mensagem!', ['class' => 'btn btn-'.$page->bt_class.' btn-block']) !!}
                        </div>    
                    {!! Form::close() !!}
                    </div>
                    <div class="col-sm-6">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>