<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.partials.head')
</head>
<body>
@include('frontend.layouts.partials.nav')

@yield('content')
@include('frontend.layouts.partials.footer')
@include('frontend.layouts.partials.footer-scripts')
 </body>
