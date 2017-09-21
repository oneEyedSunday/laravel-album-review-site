
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HipHop Headz @yield('title')</title>
    <!-- change this title for each page -->
    <link rel="images/icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{-- {{ Html::style('css/bootstrap.min.css') }} --}}
    {{ Html::style('css/style.css')}}
    @yield('stylesheets')
  </head>