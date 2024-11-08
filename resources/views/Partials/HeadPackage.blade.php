<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="shortcut icon" href="{{ asset('assets/img/Coffee Logo.webp') }}" type="image/x-icon">
<title>{{ config('app.name') }}</title>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('assets/css/Theme.css') }}">
@include('sweetalert::alert')