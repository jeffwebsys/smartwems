<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>

@include('layouts.partials.upperlinks')
<style>
    .layout-px-spacing {
        min-height: calc(100vh - 166px)!important;
    }
    .form-group label, label {
        font-size: 15px;
        color: #515151;
        letter-spacing: 1px;
    }
    .table > tbody > tr > td {
        vertical-align: middle;
        color: #515365;
        font-size: 13px;
        letter-spacing: 1px;
    }
    .table-hover:not(.table-dark) tbody tr:hover {
        background-color: #f1f2f3 !important;
    }
    table.dataTable { 
        margin-top: 0px !important;
    }
    .table > tbody::before {
        line-height: 0px;
        content: "";
        color: unset;
        display: block;

    }
    
 div .fw-900 > label, option {
     font-weight: 900;
     color: #0E1726;
 }

 div .fw-900 > input {
     border: 1px solid #5684af;
         
 }

 div .fw-900 > select {
     border: 1px solid #5684af;
 }

 .error {
     color: red !important;
     font-size: 10px;
 }

</style>
<body>
<!--loader -->
@include('layouts.extras.loader')
<!-- NavBar -->
@include('layouts.extras.navbar')
<!-- Main Div -->
@include('layouts.extras.maindiv')
<!-- SideBar -->
@include('layouts.extras.sidebar')
<!-- Content -->
@include('layouts.extras.content')
<!-- End Div -->
</div>
@include('layouts.partials.lowerlinks')
</body>
</html>
