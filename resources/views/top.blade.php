<div style="
            background: 
            {!! $page->bg_color !!} 
            url({{ url('storage/'.$page->bg_image) }})  
            ;"
    @if($page->sticked == 1)
        class="sticky-top" 
    @endif       
            >
    <div class="container">
        <div class="row">
        <div class="col-sm-2 text-center">
            @if($page->logo == 1)
                @if($prefs->logo != '')
                    <img src="{{url('storage/'.$prefs->logo)}}" class="" style="width:100px;height:auto" alt="">
                @else
                    <h2 class="text-primary">{!! $prefs->sitename !!}</h2>
                @endif    
            @endif
        </div>
        <div class="col-sm-6">
            {!! $page->content !!}
        </div>
        <div class="col-sm-4 text-center py-4">
            @if($page->whats == 1)
            {!! Form::open(['url' => 'regwhats', 'target' => '_blank']) !!}                                                
            {!! Form::submit($page->bt_whats, ['class' => 'btn btn-success btn-lg']) !!}                        
            {!! Form::close() !!}            
            @endif
        </div>
        </div>
    </div>
    
</div>