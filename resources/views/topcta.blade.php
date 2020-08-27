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
            <div class="d-flex align-items-center bd-highlight" style="height: 100vh;">
                <div class="container">
                    {!! $page->content !!}
                    <a class="btn btn-{!! $page->cta_class !!}" href="{!! $page->cta_link !!}" role="button">{!! $page->cta_text !!}</a>
                    <br>
                    <br>
                    <br>
                </div>    
            </div>
        </div>