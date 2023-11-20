@php
    $meta = \App\Models\MaSetting::first();
    $portalData = \App\Models\PortalData::where('is_active', 'Y')->get();
    $regulations = \App\Models\MaRegulation::all();
    $halls = \App\Models\Hall::all();
@endphp
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('frontend/img/icon.png')}}">
    <title>@yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('partials.front.styles')
    @stack('styles')
</head>

<body>
    @include('partials.front.header')
    @yield('content')
    @include('partials.front.footer')
    @include('partials.front.scripts')
    @stack('scripts')

</body>

</html>
