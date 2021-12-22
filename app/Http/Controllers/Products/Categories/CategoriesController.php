<?php

namespace App\Http\Controllers\Products\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;

use App\Product;

use Image;

use App\Http\Resources\CategoryResource;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        //return CategoryResource::collection($categories);
        return response()->json($categories,200);
    }

    public function index2(){
        $categories = Category::all();
        return response()->json($categories,200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //dd($request);
        $this->validate($request,[
            'category' => 'required',
            'image' => 'required'
        ]);

        $category =  new Category();
        $category->category = $request->category;
        if($request->get('image'))
        {
           $image = $request->get('image');
           $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
           \Image::make($request->get('image'))->save(public_path('Images/').$name);
         }
        $category->image = $name;
        $category->save();
        return response()->json($category,200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category' => 'required|string',
            'image' => 'required'
        ]);

       $category = Category::find($id);
       //dd($category);
       $category->category = $request->category;
       if(strlen($request->image)>100)
       {
          $image = $request->get('image');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->save(public_path('Images/').$name);
        }else{
            $category->image = $request->image;
        }
       $category->update();
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        //return redirect(route('categories'));
    }

    /**
     * Fetch products
     * of this category
    */
    public function getCategoryProducts($id){
        $products = Product::all();
        $categories = Category::all();
        return view('shop/index')->with(['products'=>$products,'categories'=>$categories]);
        $products = Category::find($id)->product();

        return response()->json($products,200);

    }
}
