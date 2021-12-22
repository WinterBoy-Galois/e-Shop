<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.js') }}"></script>
    <!-- Fonts    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 -->

   <!--Fontawesome-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" >
</head>
<body>
    @include('partials.header')
    <div id="app" class="Theme-two container-fluid">
            <div class="row justify-content-center">
                <div  class="col-xs-2 col-sm-2 col-md-2 col-lg-2 Theme ml-3 ">
                    <div class="container-fluid app-height ">
                        <div class="row mt-3 ">
                          <ul class="nav">
                            <li class="ml-1 col-sm-12 mb-1 p-1 nav-item sidebar-link-color">
                             <a href=' {{route('products')}} ' class="nav-link">Products</a>
                            </li>
                            <li class="ml-1 col-sm-12 mb-1 p-1 nav-item sidebar-link-color">
                             <a href='{{route('categories')}}' class="nav-link">Category</a>
                            </li>
                          </ul>
                         </div>
                       </div>
                </div>
                <div class="col-xs app-height col-sm col-md col-lg Theme-color-one pl-0">
                    @yield('content')
                </div>
            </div>
        @can('access-sitemenu')
         @include('partials.sidebar')
        @endcan
        @include('partials.editcategory')
        @include('partials.createcategory')
        @include('partials.privacypolicy')
        @include('partials.terms')
    </div>
    @include('partials.footer')
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
