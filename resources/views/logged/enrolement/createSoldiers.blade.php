@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Bienvenue dans Armies at War !</div>

          <div class="panel-body">
            <p>
              Chaque joueur a le droit de créer 2 soldats.
            </p>

            <form method="POST" action="{{ route('enrolement.createSoldiers.post') }}">
              {{ csrf_field() }}

              <h4>Votre premier soldat</h4>

              <div class="form-group{{ $errors->has('firstName[0]') ? ' has-error' : '' }}">
                <div class="row">
                  <label for="firstName[0]" class="col-md-4 control-label">Prénom</label>

                  <div class="col-md-6">
                    <input id="firstName[0]" type="text" class="form-control" name="firstName[0]" value="{{ old('firstName[0]') }}" required autofocus placeholder="Prénom">
                    @if ($errors->has('firstName[0]'))
                      <span class="help-block">
                        <strong>{{ $errors->first('firstName[0]') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="form-group{{ $errors->has('lastName[0]') ? ' has-error' : '' }}">
                <div class="row">
                  <label for="lastName[0]" class="col-md-4 control-label">Nom de famille</label>

                  <div class="col-md-6">
                    <input id="lastName[0]" type="text" class="form-control" name="lastName[0]" value="{{ old('lastName[0]') }}" required autofocus placeholder="Nom de famille">
                    @if ($errors->has('lastName[0]'))
                      <span class="help-block">
                        <strong>{{ $errors->first('lastName[0]') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 offset-md-4">
                  <button type="button" class="btn btn-secondary">
                    Générer aléatoirement
                  </button>
                </div>
              </div>

              <h4>Votre second soldat</h4>

              <div class="form-group{{ $errors->has('firstName[1]') ? ' has-error' : '' }}">
                <div class="row">
                  <label for="firstName[1]" class="col-md-4 control-label">Prénom</label>

                  <div class="col-md-6">
                    <input id="firstName[1]" type="text" class="form-control" name="firstName[1]" value="{{ old('firstName[1]') }}" required autofocus placeholder="Prénom">
                    @if ($errors->has('firstName[1]'))
                      <span class="help-block">
                        <strong>{{ $errors->first('firstName[1]') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="form-group{{ $errors->has('lastName[1]') ? ' has-error' : '' }}">
                <div class="row">
                  <label for="lastName[1]" class="col-md-4 control-label">Nom de famille</label>

                  <div class="col-md-6">
                    <input id="lastName[1]" type="text" class="form-control" name="lastName[1]" value="{{ old('lastName[1]') }}" required autofocus placeholder="Nom de famille">
                    @if ($errors->has('lastName[1]'))
                      <span class="help-block">
                        <strong>{{ $errors->first('lastName[1]') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      Inscription
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
