<?php

namespace App\Http\Controllers\Products\Purchase;

use App\Product;

use App\Category;

use Session;

use App\Cart;

use DB;

use App\Adress;

use App\Order;

use Mail;

use App\Mail\purchase\SuccessfulPurchaseEmail;

use Srmklive\PayPal\Services\ExpressCheckout;

use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Buyer adds product
     * to cart
    */
    public function addtocart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);
        return redirect()->route('shop');
    }
    /**
     * reduce product added
     * into the cart
    */
    public function reduceProductByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart',$cart);
    }
     /**
      * remove added product
     */
    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        //dd($cart);
        if ($cart) {
         Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
    }
    /**
     * Go to payment page
    */
    public function paymentPage(){
        if (Session::has('cart')) {
            return view('shop.pages.payment');
        }else{
            return redirect()->route('shop');
        }

    }

    public function checkout(){
        if (!Session::has('cart')) {
            return view('shop.pages.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.pages.stripe',[
            'total' =>$total
        ]);
    }

    /**
     * Save Customer Addrress
    */
    public function address(Request $request){
        //dd($request);
          $this->validate($request,[
             'Address' => 'required',
             'Address_2' => 'required',
             'City' => 'required',
             'State' => 'required',
             'Zip' => 'required'
          ]);

          $adress = Adress::firstOrNew([
            'user_id' => 3,
            'Address' => $request->Address,
            'Address_2' => $request->Address_2,
            'City' => $request->City,
            'State' => $request->State,
            'Zip' => $request->Zip,
           ],
     );
     dd($adress);

     /*
     $flight = App\Flight::updateOrCreate(
        ['departure' => 'Oakland', 'destination' => 'San Diego'],
        ['price' => 99, 'discounted' => 1]
    );
          $adress = new Adress();
          $adress->Address = $request->Address;
          $adress->Address_2 = $request->Address_2;
          $adress->City = $request->City;
          $adress->State = $request->State;
          $adress->Zip = $request->Zip;
          $adress->user_id = Auth::user()->id;
          //$adress->user()->save(User::find(Auth::user()->id));
          $adress->save(); */

    }

    public function makePaypalPayment(Request $request){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        try {

            $order = new Order();
            $order->order = serialize($cart);
            $order->address_id = 1;
            $order->user_id = Auth::user()->id;
            $order->payment_id = $request->id;

            Auth::user()->orders()->save($order);

        } catch(Exception $e){
            return response()->json($e,200);
           // return redirect()->route('pay');
        }

        Session::forget('cart');
        //return redirect()->route('/')->with('success','Checkout Was successfull');

        Mail::to(Auth::user()->email)->send(new SuccessfulPurchaseEmail());

      }
        //get Default adress if exists
        public function getDefaultAdress(){
          $address = DB::table('adresses')->where('default', 1)->first();
          if ($address) {
            return response()->json($address,200);
          }else{
            return response()->json([-1],200);
          }
        }
    }

