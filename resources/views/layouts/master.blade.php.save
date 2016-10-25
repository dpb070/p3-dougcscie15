<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title','?')
    </title>

    <meta charset='utf-8'>
    <link href="/css/foobooks.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    <header>
    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        Hello from master.blade.php
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>


    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
