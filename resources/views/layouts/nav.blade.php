<nav class="site-navbar navbar navbar-inverse navbar-fixed-top navbar-mega">
  <div class="navbar-header" style="background-image: url('/images/camou_bg.jpg');">
    <div class="navbar-brand navbar-brand-center site-gridmenu-toggle active" data-toggle="gridmenu" aria-expanded="true">
      <span class="navbar-brand-text hidden-xs-down logo-font">
        Armies At War
      </span>
    </div>
  </div>
  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse navbar-collapse-toolbar">
      <ul class="nav navbar-toolbar menu-font">
        @guest
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ env('APP_PLAY_URL') }}">Jouer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Forum</a>
          </li>
          @if ($loggedUser->isAdmin)
            <li class="nav-item {{substr(Request::path(), 0, 5) === 'admin' ? 'active':''}}">
              <a class="nav-link" href="/admin">Admin</a>
            </li>
          @endif
        @endguest
      </ul>
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Inscription</a>
          </li>
        @else
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
  </div>
</nav>
