@extends('layouts.app')

@section('title')
  Admin
@endsection

@section('sidebar')
  <ul class="site-menu">
    <li class="site-menu-category"></li>
    <li class="site-menu-item {{substr(Request::path(), 0, 11) === 'admin/board' ? 'active':''}}">
      <a class="nav-link" href="{{ route('admin.board.index') }}">
        <i class="site-menu-icon fa fa-map-o" aria-hidden="true"></i>
        Cartes
      </a>
    </li>
  </ul>
@endsection
