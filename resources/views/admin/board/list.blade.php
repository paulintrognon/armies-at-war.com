@extends('admin.layout')

@section('title', 'Admin')

@section('admin-content')
  <h2 class="main-title">
    Gestion des cartes
  </h2>
  <p>
    <a href="{{ route('admin.board.new.index') }}" class="btn btn-primary">Nouvelle carte</a>
  </p>
  <div class="admin-card">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Image</th>
          <th>Taille</th>
          <th>Nb villes</th>
          <th></th>
        </tr>
      </thead>
      @foreach ($boards as $board)
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
          <td>
            {{$board->cities()->count()}}
          </td>
          <td>
            @if ($board->isActive)
              <a href="{{route('admin.board.disactivateBoard', ['boardId' => $board->id])}}">Désactiver la carte</a>
            @else
              <a href="{{route('admin.board.activateBoard', ['boardId' => $board->id])}}">Activer la carte</a>
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
