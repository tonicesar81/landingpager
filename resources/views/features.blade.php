<div class="d-flex align-items-center bd-highlight text-center clearfix" style="background-color:{!! $page->bg_color !!}" >
            <div class="container clearfix py-5"> 
                {!! $page->content !!}
                <div class="row justify-content-md-center">
                    @foreach($page->item as $features)
                    <div class="col-sm-3">
                        <div style="background-color:{!! $features->bg_color !!};" class="m-1 border rounded">
                            @if($features->image != '')
                            <div class="bg-white py-5 mb-3" style="min-height:150px;">
                                <img src="{{ url('storage/'.$features->image) }}" class="" style="width:auto;max-height:60px" alt="">
                            </div>
                            @endif
                            @if($features->content != '')
                            {!! $features->content !!}
                            @endif
                        </div>                       
                    </div>
                    @endforeach
                </div>              
            </div>    
        </div>