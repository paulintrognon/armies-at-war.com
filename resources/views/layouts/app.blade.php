<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') - Armies At War</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ mix('css/bootstrap-extend.css') }}">
  <link rel="stylesheet" href="{{ mix('css/remark.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body class="dashboard site-menubar-unfold">
  @include('layouts.nav')
  <div class="site-menubar">
    <div class="site-menubar-body">
      @yield('sidebar')
    </div>
  </div>
  <div class="page">
    <div class="page-content container-fluid">
      @yield('content')
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
  @stack('scripts')
</body>
</html>
