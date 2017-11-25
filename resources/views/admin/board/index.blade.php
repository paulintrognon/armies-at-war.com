@extends('admin.layout')

@section('title', 'Admin')

@section('admin-content')
  <h2 class="main-title">
    Gestion des cartes
  </h2>
  <div class="admin-card">
    @foreach ($boards as $board)
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Image</th>
            <th>Taille</th>
          </tr>
        </thead>
        <tr>
          <td>
            {{$board->id}}
          </td>
          <td>
            {{$board->name}}
          </td>
          <td>
            <img src="/{{$board->path}}" alt="">
          </td>
          <td>
            {{$board->sizeX}}x{{$board->sizeY}}
          </td>
        </tr>
      </table>
    @endforeach
  </div>
@endsection
