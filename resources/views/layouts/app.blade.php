<!DOCTYPE html>
<html lang="en">
<head>
    <title>Noman Kabeer</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    @yield('content')
</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@stack('scripts')
</body>
</html>