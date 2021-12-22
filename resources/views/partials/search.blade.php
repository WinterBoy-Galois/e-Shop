 <!-- Search form -->
 <div class="col-sm-9 offset-sm-1 mt-1 text-center Theme p-1">
    <form method="GET" action=" {{route('searchedproducts')}} ">
        <div id="search-bar" class="form-group">
           <input id="form-input" name="search" type="search" rows="4" class="form-control  search-engines" placeholder="Search Products,Brands and categories" value="{{request()->input('search')}}">
           <button id="form-btn" class="btn search-btn heading-color bg-success Theme search-engines" type="submit">Search</button>
        </div>                   
    </form>
  </div>
