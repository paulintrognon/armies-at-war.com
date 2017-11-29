@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
      <div class="panel panel-primary panel-line">
        <div class="panel-heading">
          <h3 class="panel-title">
            Connexion
          </h3>
        </div>
        <div class="panel-body container-fluid">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="row">
                <label for="email" class="col-md-4 control-label">Email</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="row">
                <label for="password" class="col-md-4 control-label">Mot de passe</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>

                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6 offset-md-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Connexion
                  </button>

                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                  </a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
