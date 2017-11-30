@extends('admin.layout')

@section('title', 'Cartes - Admin')

@section('page-header', 'Gestion des cartes')

@section('content')
  <ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
      <a class="nav-link {{Request::route()->getName() === 'admin.board.index' ? 'active':''}}" href="{{ route('admin.board.list') }}">
        Carte active
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{Request::route()->getName() === 'admin.board.list' ? 'active':''}}" href="{{ route('admin.board.list') }}">
        Toutes les cartes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{Request::route()->getName() === 'admin.board.new.index' ? 'active':''}}" href="{{ route('admin.board.new.index') }}">
        Nouvelle carte
      </a>
    </li>
  </ul>
  <div class="panel">
    <div class="panel-body">
      @yield('board-content')
    </div>
  </div>
@endsection
