<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials._head')
    @stack('styles')
</head>
<body>
@include('partials._nav')
<!-- Begin page content -->
<main role="main">
    @include('inc.messages')
    @yield('content')
</main>
@include('partials._footer')
@include('partials._javascript')
@stack('scripts')
</body>
</html>