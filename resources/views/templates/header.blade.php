<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Swimming Gala    </title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <script src="https://kit.fontawesome.com/50b2c65ebd.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        
    </head>
    <body class="sidebar-mini  layout-fixed @if (!Auth::guest()) do this @else login-page @endif">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center  sm:pt-0">
            <!-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif  
                    @endauth
                </div>
            @endif -->