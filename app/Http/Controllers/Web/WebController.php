<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use DB;

use App\User;

use Session;

use Illuminate\Support\Facades\Auth;

use App\Cart;

class WebController extends Controller
{
    public $current_id;

    public function products(){
        $products = DB::table('products')->paginate(6);
        $categories = Category::all();
        $otherproducts = DB::table('products')
        ->inRandomOrder()
        ->get();
        return view('shop.pages.home')->with(['products'=>$products,'categories'=>$categories,'otherproducts'=>$otherproducts]);

    }

    public function about()
    {
        return view('shop.pages.about');
    }

    /**
     * Help and support
     * show user how to
     *  get started with
     * e-shop
    */

    public function help()
    {
        return view('shop.pages.help');
    }

    /**
     * Selected products
     * cart
     */
    public function getCartProducts()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return response()->json($cart,200);
   }

      //show cart

    public function cart()
     {
         if (Auth::user()) {
            return view('shop.pages.cart');
         }else{
             return redirect()->route('login');
         }
     }


    //search Products
    public function searchedProducts(Request $request){
        //dd($request);
        $this->validate($request,[
          'search' => 'required|min:3'
        ]);
        $query = $request->input('search');
        $products = Product::where('title','like',"%$query%")->paginate(6);
        $categories = Category::all();
        $otherproducts = DB::table('products')
        ->inRandomOrder()
        ->get();
       // dd($products);
        return view('shop.pages.search-results')->with(['products'=>$products,'categories'=>$categories,'otherproducts'=>$otherproducts]);
    }

    public function pageNotFound(){
        return view('shop.pages.pagenotfound');
    }

    public function productsBycategory($id){
        $products = DB::table('products')
                             ->where('category_id',$id)
                             ->paginate(6);
        $categories = Category::all();
        $otherproducts = DB::table('products')
        ->inRandomOrder()
        ->get();
        return view('shop.pages.home')->with(['products'=>$products,'categories'=>$categories,'otherproducts'=>$otherproducts ]);
    }

    /**
     * Show Single selected product
    */
    public function product($id){
         $product = Product::find($id);
         $otherproducts = DB::table('products')
            ->where('category_id',$product->category_id)
            ->inRandomOrder()
            ->limit(6)
            ->get();
        $about = Product::select('about')->where('id', $id)->get();

         return view('shop.pages.product')->with(['product'=>$product,'otherproducts'=>$otherproducts,'about'=>$about->toJson()]);
    }

   /**
    * Automattically sign in recruiters
   */
  public function AutoSignIn(){
      $autoUser = User::find(1);
      //dd($autoUser);
      Auth::login($autoUser,true);
  }
  public function checkIfSignedIn(){
       if(Auth::user()){
           return response()->json(['true'],200);
       }else{
        return response()->json(['false'],200);
       }
  }



}
