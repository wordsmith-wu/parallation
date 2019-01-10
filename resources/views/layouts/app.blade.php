<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Parallation') - Parallation 翻译平台</title>
    <link rel="icon" href="https://lg-e9axehe0-1256892260.cos.ap-shanghai.myqcloud.com/head.png" sizes="16x16 32x32" type="image/png">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  </head>


  <body>
    <div id="app" class="{{ route_class() }}-page">

      @include('layouts._header')

      <div class="container">

        @include('shared._messages')

        @yield('content')

      </div>

      @include('layouts._footer')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
  </body>

</html>