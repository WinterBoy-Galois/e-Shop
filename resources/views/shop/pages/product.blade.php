@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5 mb-5">
    <div class="row mt-3">
        <div class="col-sm-9">
            <div class="card Theme">
                <div class="card-header"><h5 class="heading-color">{{$product->title}}</h5></div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-xs-5  col-sm-5">
                            <img src=" {{ asset('Images/' . $product->imagePath) }}" alt="" class="img-fluid img-thumbnail" srcset="">
                        </div>
                        <div class="col-xs-5  col-sm-5">
                              <p class="card-text mb-5 text-white">{{$product->description}}</p>
                              <hr class="bg-white">
                              <h2 class="text-white"> <sup><i class="fas fa-dollar-sign    "></i> </sup> {{$product->price}} </h2>
                              <div class="row">
                                <div class="col-sm-12 mt-5">
                                    <button onclick="shopOrCheckout({{$product->id}})"  class="btn btn-success text-secondary mt-1 mb-1"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
            <div class="card Theme">
                <div class="card-body mb-3">
                   <about :aboutid="{{$product->id}}" ></about>
                </div>
             <div class="card-footer">
                 <a type="button"  href="/Editor" class="btn-success text-white">Edit About</a>
             </div>
            </div>
        </div>
        <div class="col-sm-3 Theme products-sidebar ml-0 mb-0">
            <div class="card Theme">
              <ul class="nav flex-column">
                  <div class="nav-item heading-style heading-color">You May Want</div>
                @foreach ($otherproducts as $otherproduct)
                 <li class="nav-item">
                     <div class="nav-item text-white">
                        {{$otherproduct->title}}
                     </div>
                 <a class="nav-link link-color" href=" {{route('product',['id'=>$otherproduct->id])}}"> <img class="product-sidebar-img-size" src="{{asset('Images/' . $otherproduct->imagePath)}}" alt="" srcset="">   </a>
                 </li>
                @endforeach
              </ul>
            </div>
        </div>
    </div>
</div>
<shoporcheckout></shoporcheckout>
<carrier></carrier>
@endsection
