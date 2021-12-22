 <!--<loading></loading>-->
<div class="card Theme header-fixed">
<nav class="navbar navbar-expand-lg navbar-height">
  @can('access-sitemenu')
    <button class="btn-primary mr-5 ml-3" onclick="displaySidebar()" type="button" class="mr-3"> <i class="fa fa-list" aria-hidden="true"></i> App Menu  </button>
  @endcan
  <a class="navbar-brand link-color" href="/shop"> <i class="fa fa-home" aria-hidden="true"></i> e-shop</a>
  <a href="{{route('about')}}" class="nav-link ml-2 link-color"> About Us </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> <i class="fa text-white fa-list" aria-hidden="true"></i> </span>
  </button>
  <a href="{{route('/')}}" class="nav-link ml-2 link-color"> <logo_load></logo_load> </a>
  <div  class="collapse mr-1 justify-content-end navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link link-color" href="{{route('cart')}}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
         <span class="badge badge-danger ">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
        </a>
      </li>
      <p id="cart-tooltip" class=" bg-secondary" data-toggle="tooltip" data-placement="top" title="Your selected products are stored here, to view them click here"></p>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user" aria-hidden="true"></i>
         @guest
         User Account
         @else
         {{ Auth::user()->name }} <span class="caret"></span>
         @endguest
        </a>
        <div class="dropdown-menu Theme" aria-labelledby="navbarDropdown">
        @guest
          <a class="dropdown-item link-color" href="{{route('login')}}"> Sign In </a>
          @if (Route::has('register'))
           <a class="dropdown-item link-color" href="{{route('register')}}">Sign Up</a>
           @endif
        @else
        <a class="dropdown-item link-color" href="{{route('profile')}}"> My Profile </a>
          <a class="dropdown-item link-color" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @endguest
      </li>
    </ul>
  </div>
</nav>
 </div>
