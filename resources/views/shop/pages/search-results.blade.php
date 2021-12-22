@extends('layouts.app')
@section('content')
  <div  class="row justify-content-center">
      <!-- Sidebar Menu-Categories -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 Theme products-sidebar ml-0 mb-0">
      <div class="card Theme fix-sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <h1 class="nav-link heading-color heading-style" >Categories </h1>
            </li>  
          @foreach ($categories as $category)
           <li class="nav-item">
           <a class="nav-link link-color" href=" {{route('categoryproducts',['id'=>$category->id])}}"> <img class="category-img" src="{{asset('Images/' . $category->image)}}" alt="" srcset=""> {{$category->category}}  </a>
           </li>              
          @endforeach
          <li class="nav-item">
            <a class="nav-link link-color" href="#">  Other Categories </a>
          </li>
        </ul>
      </div>
    </div>
     <!--Products-->
    <div class="col-xs-12 col-sm-9 mt-2 col-md-12 col-lg-9">
      <div class="row content-justify-center mt-1 ">
        <!--Search Bar-->
          <div class="card Theme col-sm-12">
              <row class="justify-content-center">
                <div class="col-sm-12">
                  @include('partials.search')
                </div>
                <p  class="col-sm-12 btn btn-success  text-lead">
                    Search Results <span class="badge badge-light display-4"> {{sizeof($products)}} </span>
                </p>
              </row>
          </div>
          @if(sizeof($products)>0)
          <div class="col-sm-12">
            <hr class="bg-white display-1">
            <div class="row  justify-content-center ml-2">
                @foreach($products as $data)
                 <div class="col-sm-4 mb-1 mt-1 product-height text-center">
                   <div class="card  Theme">
                   <div>
                    <a class="" href=" {{route('product',['id'=>$data->id])}} ">
                   <img src="{{ asset('Images/' . $data->imagePath) }} " class="img-fluid product-link img-thumbnail" alt="...">
                    </a>
                    <h3 class="text-white"> {{$data->title}} </h3>
                    <p class="text-white"> {{$data->description}} </p>
                   <div> 
                     <h3 class="price text-white"> <sup> <i class="fas fa-dollar-sign    "></i> </sup> {{$data->price}} </h3> 
                   <div class="col-sm-12 mt-1 mb-1">
                       <a href="{{route('add-to-cart',['id'=>$data->id])}}" class="btn btn-success text-secondary mt-1 mb-1"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add To Cart</a>
                   </div>
                   </div>
                   </div>
                   </div>
                 </div>
                @endforeach
            </div>
          </div>       
          @endif
          @if (sizeof($products)==0)
          <div class="col-xs-12  col-sm-12 col-md-12">
            <card class="Theme text-center">
                <div class="card-body">
                    <div class="card-title Theme text-danger heading-style display-3">Product not found</div>
                    <div class="card-text Theme text-info text-center display-4">The Product You Were looking for is not in our stock currently</div>
                </div>
            </card>
          </div>
          @endif
        @if (sizeof($products)>=6)
        <div class="col-sm-12 Theme ml-2 mr-2">
            <nav class="Page navigation mt-2">
              <ul  class="pagination justify-content-center list-unstyled">
                <li class="page-item">{{$products->links()}}</li>
              </ul>
            </nav>
          </div>            
        @endif
      </div>
    </div>
  </div>
  <carrier></carrier>
@endsection