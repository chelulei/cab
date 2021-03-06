<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials._head')
    @stack('styles')
</head>
<body>
@include('partials._nav')

<main role="main">
    @include('inc.messages')
    @yield('content')
    @include('partials._footer')
</main>

@include('partials._javascript')
@stack('scripts')
</body>
</html>