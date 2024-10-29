<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('Partials.HeadPackage')
    <link rel="stylesheet" href="{{ asset('assets/css/BannerPage.css') }}">
</head>

<body>
    @include('Partials.Header')
    @include('Partials.SideCart')
    @include('Templates.Banner')

    @include('Partials.Script')
</body>

</html>
