<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.partials.head')
    </head>
    <body class="app sidebar-mini rtl">
        @include('admin.partials.header')
        @include('admin.partials.sidebar')
        <main class="app-content" id="app">
            @yield('content')
        </main>
        @include('admin.partials.scripts')
    </body>
</html>
