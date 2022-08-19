<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.includes.meta')
    <title>@yield('title') </title>
    @include('front.includes.style')
</head>
<body>
    <div class="page-wrapper">
    @include('front.includes.header')
    @yield('body')
    @include('front.includes.footer')
    </div>
    @include('front.includes.mobile-menu')
    @include('front.includes.script')
</body>
</html>

