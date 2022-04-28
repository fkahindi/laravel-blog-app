<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('site.layouts.partials.head')
</head>
<body>
    <div id="app">
        @include('site.layouts.partials.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
