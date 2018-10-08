<header>
  <nav class="navbar navbar-expand-md  navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="{{ url('/') }}">Cab</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        @if (Route::has('login'))
          @auth
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link login" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
          @endauth
        @endif
      </ul>
    </div>
  </nav>
</header>