<header>
    <nav class="navbar navbar-expand-md  navbar-light bg-light fixed-top border-bottom shadow-sm">
    <a class="navbar-brand" href="{{ url('/') }}">Cab</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarCollapse">
      <ul class="navbar-nav">
          <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="#">Cars <span class="sr-only">(current)</span></a>
          </li>
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