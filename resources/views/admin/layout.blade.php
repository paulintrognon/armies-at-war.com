@extends('layouts.app')

@section('title')
  Admin
@endsection

@section('content')
  <div class="row no-gutters">
    <div class="col-12 col-md-3 col-lg-2">
      <ul class="nav flex-column admin-main-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.board.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>
            Utilisateurs
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{substr(Request::path(), 0, 11) === 'admin/board' ? 'active':''}}" href="{{ route('admin.board.index') }}">
            <i class="fa fa-map-o" aria-hidden="true"></i>
            Cartes
          </a>
        </li>
      </ul>
    </div>
    <div class="col-12 col-md-9 col-lg-10">
      <div class="admin-content">
        @yield('admin-content')
      </div>
    </div>
  </div>
@endsection
