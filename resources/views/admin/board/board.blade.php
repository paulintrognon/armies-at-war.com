@extends('admin.layout')

@section('title', 'Admin')

@section('content')
  <h2 class="page-title">
    Carte {{ $board->name }}
  </h2>
  <p>
    <a href="{{ route('admin.board.new.index') }}" class="btn btn-primary">Nouvelle carte</a>
    <a href="{{ route('admin.board.list') }}" class="btn btn-primary">Liste des cartes</a>
  </p>
  <div class="admin-card">
    <div class="row">
      <div class="col-4">
        <img src="/{{$board->path}}" width="100%">
      </div>
      <div class="col-8">
        <h5>
          Taille : {{$board->sizeX}}x{{$board->sizeY}}
        </h5>
        <h4>
          <i class="fa fa-building" aria-hidden="true"></i> Villes
        </h4>
        <form action="index.html" method="post">
          <ul>
            @foreach ($board->cities()->get() as $city)
              <li>
                {{$city->x}}/{{$city->y}} :
                @php $cityArmy = $city->getCityData()['army']; @endphp
                @include('admin.board.partials.armySelector', [
                  'armySelectorName' => "cityArmy[$city->id]",
                  'armySelectorCurrentArmy' => $cityArmy,
                ])
              </li>
            @endforeach
          </ul>
        </form>
      </div>
    </div>
  </div>
@endsection
