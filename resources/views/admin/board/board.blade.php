@extends('admin.board.layout')

@section('title', 'Admin')

@section('board-content')
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
@endsection
