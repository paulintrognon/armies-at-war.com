@extends('admin.board.layout')

@section('title', 'Liste des cartes - Admin')

@section('board-content')
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
            <a href="{{route('admin.board.disactivateBoard', ['boardId' => $board->id])}}" class="btn btn-primary">
              Désactiver la carte
            </a>
          @else
            <a href="{{route('admin.board.activateBoard', ['boardId' => $board->id])}}" class="btn btn-primary">
              Activer la carte
            </a>
          @endif
        </td>
      </tr>
    @endforeach
  </table>
@endsection
