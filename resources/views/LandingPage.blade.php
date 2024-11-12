<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('Partials.HeadPackage')
    <link rel="stylesheet" href="{{ asset('assets/css/HomePage.css') }}">
</head>

<body>
    @include('Partials.Header')
    @include('Partials.SideCart')
    @include('Templates.Banner')

    @include('Partials.Script')
    @include('Partials.Toastr')
</body>

</html>
