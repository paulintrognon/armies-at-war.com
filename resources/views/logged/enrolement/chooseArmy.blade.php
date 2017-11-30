@extends('layouts.app')

@section('title', 'Choix de l\'armée')

@section('page-header', 'Veuillez à présent choisir votre armée.')

@section('content')
  <div class="row">
    @foreach ($armies as $army)
      <div class="col-{{12/$armies->count()}} text-center">
        <div class="card">
          <div class="card-block" style="background: url('/images/{{$army->code}}-flag.png');background-size:cover;height:50vh;margin-bottom:20px;">
          </div>
          <div class="card-block">
            <h4 class="card-title">
              {{$army->name}}
            </h4>
            <div class="card-text">
              @if ($army->code === 'DU')
                La démocratie, c'est la paix, et la paix, c'est la prospérité.<br>
                Notre devoir est de promouvoir la démocratie,<br>
                et ce par tous les moyens jugés nécéssaires.<br>
                Car la fin, nous le savons tous, justifie les moyens.<br>
              @elseif ($army->code === 'EL')
                Le Vénérable nous montre la Voie,<br>
                Cette Voie nous protège et nous libère.<br>
                La Voie nous menera vers le Grand Jour.<br>
                Vive le Vénérable, Vive l'Empire du Levant !<br>
              @endif
            </div>
          </div>
          <div class="card-block">
            <div class="card-text">
              <a class="btn btn-primary" href="{{ route('enrolement.chooseArmy.post', ['armyId' => $army->id])}}">
                Rejoindre
                {{$army->name}}
              </a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
