<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\Category;

use Session;

use App\Cart;

use DB;

use Gate;

use Image;

use App\Http\Resources\ProductResource;


class ProductsController extends Controller
{
 /**
     * return products  
    */
    public function index()
     {
      $products = Product::paginate(5);
      return ProductResource::collection($products);
    }
 /**
     * edit product
    */
    public function edit($id)
     {
        if (Gate::denies('manage-products')) {
            return redirect(route('shop'));
        }
        $product = Product::find($id);
        return view('partials.edit')->with(['$product'=>$product]);
    }

    /**
     * delete product
    */
    public function deleteProduct($id)
     {
        if (Gate::denies('manage-products')) {
            return redirect(route('shop'));
        }
        Product::find($id)->delete();

       
    }

    /**
     * edit product
    */
    public function update(Request $request, $id)
     {
         //dd($request);
        if (Gate::denies('manage-products')) {
            return redirect(route('shop'));
        }
        $product = Product::find($id);
        $product->title = $request->title;
        //Storage::fake('public');
        $product->imagePath = $request->imagePath;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->update();


    }

    /**
     * Store New Products
     *  to the Database
    */

    /*public function store(Request $request)
     {
         dd($request);
        if (Gate::denies('manage-products')) {
            return redirect(route('shop'));
        }
        $product = new Product();
        $product->title = $request->title;
        $product->imagePath = $request->imagePath;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->save();
        
    }*/

    public function store(Request $request)
    {
       //dd($request);
       if (Gate::denies('manage-products')) {
           return redirect(route('shop'));
       }
       $product = new Product();
       $product->title = $request->title;
       if($request->get('imagePath'))
       {
          $image = $request->get('imagePath');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('imagePath'))->save(public_path('Images/').$name);
        }
       $product->imagePath = $name;
       $product->price = $request->price;
       $product->description = $request->description;
       $product->category_id = $request->category;
       $product->save();

       //dd($product);
       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
   }


    public function searchedProducts(Request $request)
    {
        dd($request);
        $products = (new Search())
        ->registerModel(Product::class, 'title')
        ->search($request->search);

        $categories = Category::all();
        return view('shop.productsearch')->with(['products'=>$products,'categories'=>$categories]);
    }
    
    /**
     * show Product About
     * Seo Content
    */
    public function showProductData($id){
          $Product = Product::find($id);
           return response()->json($Product,200);
    }

    /**
     * Edit Product About Seo Content
     * using
    */
    public function saveProductAbout(Request $request, $id){
          $Product = Product::find($id);
          $Product->about = $request->about;
          $Product->save();
    }


}
