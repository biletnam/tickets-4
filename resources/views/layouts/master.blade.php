<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    @section('styles')
        @include('partials.styles')
    @show
</head>
<body id="app-layout">

@include('partials._nav')

@include('partials._notification')

<div class="row">
    <div class="col-lg-10 col-lg-push-1">
        @yield('content')
    </div>
</div>


@section('customScripts')
    @include('partials.scripts')
@show
</body>
</html>
