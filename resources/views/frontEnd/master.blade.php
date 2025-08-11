<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>

    @include('frontEnd.include.style')
</head>

<body>

    @include('frontEnd.include.header')

    @yield('body')

    @include('frontEnd.include.footer')

    @include('frontEnd.include.script')

</body>

</html>
