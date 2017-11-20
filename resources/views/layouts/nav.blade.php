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
        <li class="nav-item">
          <a class="nav-link" href="{{ env('APP_PLAY_URL') }}">Jouer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Forum</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link"
              href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Déconnection
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      @endguest
    </ul>
  </div>
</nav>