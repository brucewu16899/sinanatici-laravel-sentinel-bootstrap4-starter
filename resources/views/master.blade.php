<!doctype html>
<html lang="{{ app()->getLocale() }}" class="@if(isset($html_class)){{$html_class}}@endif">
@include('_partials.head')
<body class="@if(isset($body_class)){{$body_class}}@endif">
@include('_partials.header')
<div class="container py-4">
    <div class="row">
        @yield('content')
    </div>
</div>
@include('_partials.footer')
<script  src="{{asset('/js/app.js')}}"></script>
<script  src="{{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>
@yield('footer-js-after')
@yield('customjs')
</body>
</html>