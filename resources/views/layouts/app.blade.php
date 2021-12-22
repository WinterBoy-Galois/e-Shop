<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <script src="{{ asset('js/all.js') }}"></script>
    <!-- Fonts -->
    <!-- <script src="https://js.braintreegateway.com/web/dropin/1.23.0/js/dropin.min.js"></script> <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" >

    <script src="https://www.paypal.com/sdk/js?client-id=AfVKNAYNs6zXEJVdvm2t3Kw7GsU31Tjp_jy9dDl3m2KafGcu2yB6pS2XCjqsZ78KERE3IBVqUdf5fnzZ"></script>
</head>
<body>
      <div id="app" >
        <div id="e-shop-app">
          @include('partials.header')
          <div class="Theme-two container-fluid">
                  <div class="container-fluid">
                 @can('access-sitemenu')
                   @include('partials.sidebar')
                 @endcan
                   @include('partials.privacypolicy')
                   @include('partials.terms')
                   @yield('content')
                  </div>
          </div>
          @include('partials.footer')
        </div>
       <!--<autosignin></autosignin>  -->
       <!--<loading></loading>-->  
      </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
