<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use DB;

use App\Adress;

use App\AccountDeleteReasons;

use Newsletter;

class CustomerController extends Controller
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
     * Get Customer purchase
     * History
    */
    public function profile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('Customer.profile')->with(['orders'=>$orders]);
    }
    /**
     * Customer Logout from account
    */
    public function logout(){
        Auth::logout();
        return redirect()->route('/');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileDetails()
    {
        return response()->json(Auth::user(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function address()
    {
        $addresses = DB::table('adresses')
                             ->where('user_id',Auth::user()->id)
                             ->get();
        return response()->json($addresses,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateDetails(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $this->validate($request,[
                'password' => 'required|min:8',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::user()->delete();
    }
    /**
     * Update Customer Addrress
    */
    public function updateAddress(Request $request,$id){
        //dd($request);
          $this->validate($request,[
             'Address' => 'required',
             'Address_2' => 'required',
             'City' => 'required',
             'State' => 'required',
             'Zip' => 'required'
          ]);

          $adress = Adress::find($id);
          $adress->Address = $request->Address;
          $adress->Address_2 = $request->Address_2;
          $adress->City = $request->City;
          $adress->State = $request->State;
          $adress->Zip = $request->Zip;
          $adress->default = $request->default;
          $adress->user_id = Auth::user()->id;
          $adress->update();

    }
    public function defaultAddress(){
        $address = DB::table('adresses')
                      ->orderby('updated_at')
                      ->where('default',1)
                      ->first();
                      return response()->json($address,200);
    }

    public function deleteAccountReasons(Request $request){

        $reasons = new AccountDeleteReasons();
        $reasons->I_dont_get_What_I_Want = $request->Reason1;
        $reasons->e_shop_app_is_slow = $request->Reason2;
        $reasons->It_is_difficult_to_use_e_shop_Application = $request->Reason3;
        $reasons->Poor_Services = $request->Reason4;
        $reasons->I_dont_Have_A_reason = $request->Reason5;
        $reasons->save();

    }

    //get customer orders

    public function getOrders(){

        /*$orders = DB::table('orders')
                      ->where('user_id',Auth::user()->id)
                      ->get();*/

        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
           $order->order =  unserialize($order->order);
           return $order;
        });

        return response()->json($orders,200);


    }
    public function manageNewsletterSubscription(Request $request){
        //dd($request->type);
        if ($request->type=='subscribe') {
            DB::table('users')->where('id',Auth::user()->id )->update(['subscription' => $request->type]);
            $subscribe = Newsletter::subscribe(Auth::user()->email, ['NAME'=>Auth::user()->name]);
            dd($subscribe);
        }else{
           $test = Newsletter::unsubscribe(Auth::user()->email);
            dd($test);
        }
     }

}
