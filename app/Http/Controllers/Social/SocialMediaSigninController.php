<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\User;

use Str;

class SocialMediaSigninController extends Controller
{
     
      //Redirect To Github to Sign In
    public function gitHub()
    {
       return Socialite::driver('github')->redirect();
    } 

    /**
      *If User exist in our application sign in
      * user with the email Sign In else create
      * with
     */

    public function gitHubRedirect()
    {
        $user = Socialite::driver('github')->user();
        $user = User::firstOrCreate([
           'email'=> $user->email,
        ],
        [
            'name' => $user->nickname,
            'email'=> $user->email,
            'password' => Hash::make(Str::random(24))
        ]
    );
    Auth::login($user,true);
    return redirect(route('shop'));
    }

      //Redirect To Google to Sign In
      public function google()
      {
         return Socialite::driver('google')->redirect();
      } 
  
      /**
        *If User exist in our application sign in
        * user with the email Sign In else create
        * with
       */
      public function googleRedirect()
      {
          $user = Socialite::driver('google')->user();
          $user = User::firstOrCreate([
             'email'=> $user->email,
          ],
          [
              'name' => $user->nickname,
              'email'=> $user->email,
              'password' => Hash::make(Str::random(24))
          ]
      );
      Auth::login($user,true);
      return redirect(route('shop'));
      }

      //Redirect To linkedin to Sign In
      public function linkedin()
      {
         return Socialite::driver('linkedin')->redirect();
      } 
  
      /**
        *If User exist in our application sign in
        * user with the email Sign In else create
        * with
       */
  
      public function linkedinRedirect()
      {
          $user = Socialite::driver('linkedin')->user();
          $user = User::firstOrCreate([
             'email'=> $user->email,
          ],
          [
              'name' => $user->nickname,
              'email'=> $user->email,
              'password' => Hash::make(Str::random(24))
          ]
      );
      Auth::login($user,true);
      return redirect(route('shop'));
      }

      //Redirect To Pinterest to Sign In
      public function facebook()
      {
         return Socialite::driver('facebook')->redirect();
      } 
  
      /**
        *If User exist in our application sign in
        * user with the email Sign In else create
        * with
       */
  
      public function facebookRedirect()
      {
          $user = Socialite::driver('facebook')->user();
          $user = User::firstOrCreate([
             'email'=> $user->email,
          ],
          [
              'name' => $user->nickname,
              'email'=> $user->email,
              'password' => Hash::make(Str::random(24))
          ]
      );
      Auth::login($user,true);
      return redirect(route('shop'));
      }

}
