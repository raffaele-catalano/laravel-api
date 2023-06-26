<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boolfolio</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="/logo-small.png" type="png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Font-Awesome --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'
        integrity='sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw=='
        crossorigin='anonymous' />

    {{-- CK Editor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/scss/admin.scss', 'resources/js/admin.js'])
</head>

<body>


    <div id="app">

        @include('admin.partials.header')

        <main>
            <div class="main-wrapper @auth d-flex @endauth">
                @auth
                    @include('admin.partials.aside')
                @endauth

                <div class="main-view w-100 overflow-auto">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
