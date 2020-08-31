<!doctype html>
<html lang="en">
    <head>
    
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>{!! $prefs->sitename !!}</title>
    </head>
    <body>
    
        @foreach($modules as $page)
            @switch($page->module)
                @case('top')
                    @include('top')
                @break
                @case('cta')
                    @include('topcta')
                @break
                @case('topform')
                    @include('topform')
                @break
                @case('feature')
                    @include('features')
                @break
                @case('form')
                    @include('forms')
                @break
                @case('info')
                    @if($page->side == 'R')
                        @include('infor')
                    @else
                        @include('infol')
                    @endif
                @break
            @endswitch
        @endforeach
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/app.js') }}" defer></script>       
    </body>
</html>