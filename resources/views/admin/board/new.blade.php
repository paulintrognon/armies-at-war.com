@extends('admin.layout')

@section('title', 'Nouvelle carte - Admin')

@section('content')
  <h2 class="page-title">
    Gérer la carte
  </h2>
  <div class="admin-card">
    <h3 class="subtitle">Importer une nouvelle carte</h3>

    <form action="{{ route('admin.board.new.post') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <input type="text" name="name" placeholder="Nom de la carte" required>
      </div>
      <div class="form-group">
        <input type="file" name="boardImage" id="boardImage">
      </div>
      <button type="submit" class="btn btn-primary">Uploader</button>
    </form>
  </div>

@endsection
