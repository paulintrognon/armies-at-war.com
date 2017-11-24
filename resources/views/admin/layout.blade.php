@extends('layouts.app')

@section('title')
    @yield('title') - Admin
@endsection

@section('content')
    <div class="row no-gutters">
        <div class="col-12 col-md-3 col-lg-2">
            <ul class="nav flex-column admin-main-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.map.index') }}">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        Utilisateurs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{\Request::route()->getName() === 'admin.map.index' ? 'active':''}}" href="{{ route('admin.map.index') }}">
                        <i class="fa fa-map-o" aria-hidden="true"></i>
                        Carte
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
