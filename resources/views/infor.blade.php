<div id="{!! $page->anchor !!}" class="d-flex align-items-center bd-highlight clearfix" style="background: {!! $page->bg_color !!}">
            <div class="container py-5">
                <div class="row">
                    @if($page->image != '')
                    <div class="col-sm-6">
                    @else
                    <div class="col-sm-12">
                    @endif
                        {!! $page->content !!}
                    </div>
                    @if($page->image != '')
                    <div class="col-sm-6">
                        <img src="{{ url('storage/'.$page->image) }}" class="img-fluid rounded shadow">
                    </div>
                    @endif
                </div>
            </div>
        </div>