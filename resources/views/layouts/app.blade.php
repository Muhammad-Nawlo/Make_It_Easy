<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon/apple-touch-icon-152x152.png')}} ">
    <title> @yield('title') | {{ config('app.name', 'Make It Easy') }}</title>
    @include('panels.styles')
    @vite(['resources/js/app.js'])
</head>
<body class="scrollbar scrollbar-primary">
@include('panels.toastr')
@include('panels.sidebar')
<div id="app" class="app-without-sidebar">
    @include('panels.header')
    <main class="p-3 force-overflow ">
        @include('panels.breadcrumb')
        <section class="bg-white px-3 w-100" id="content">
            @yield('content')
        </section>
    </main>
</div>
@include('partials.m-delete')
@include('panels.scripts')
</body>
</html>
