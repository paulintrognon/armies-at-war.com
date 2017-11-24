<nav class="main-nav navbar navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Armies At War</a>
    <ul class="nav justify-content-end">
      @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Inscription</a>
        </li>
      @else
        @if ($loggedUser->isAdmin)
          <li class="nav-item">
            <a class="nav-link" href="/admin">Admin</a>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ env('APP_PLAY_URL') }}">Jouer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            {{ \Auth::user()->name}}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
          </a>
        </li>
      @endguest
    </ul>
  </div>
</nav>
