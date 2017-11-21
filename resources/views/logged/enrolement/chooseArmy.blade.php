@extends('layouts.app')

@section('content')
  <div class="container">
    <h4 class="centered-title">
      Veuillez à présent choisir votre armée.
    </h4>

    <div class="row">
      @foreach ($armies as $army)
        <div class="col-6">
          <a class="panel army-choice army-{{$army->code}}" href="{{ route('enrolement.chooseArmy.post', ['armyId' => $army->id])}}">
            <div class="bottom-body">
              <h4>
                {{$army->name}}
              </h4>
              <p>
                @if ($army->code === 'DU')
                  La démocratie, c'est la paix, et la paix, c'est la prospérité.<br>
                  Notre devoir est de promouvoir la démocratie et la libertée,<br>
                  et ce par tous les moyens jugés nécéssaires.<br>
                  Car la fin, nous le savons tous, justifie les moyens.<br>
                @elseif ($army->code === 'EL')
                  La Foi est notre Force, La Foi est notre Guide.<br>
                  Nous avons Foi en l'Empereur, Loué soit l'Empereur !<br>
                  Nous avons Foi en l'Empire, Gloire au Grand Empire !<br>
                  La Foi sera la Victoire sur les Hérétiques.<br>
                @endif
              </p>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endsection
