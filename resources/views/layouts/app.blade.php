<!DOCTYPE html>
<html class="no-js" lang="ID">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('partials.front.styles')
    @stack('styles')
</head>

<body>
    @include('partials.front.header')
    @include('partials.front.navbar')

    {{-- CONTENT --}}
    @yield('content')
    {{-- END CONTENT --}}

    @include('partials.front.footer')
    @include('partials.front.scripts')
    @stack('scipts')
</body>

</html>
