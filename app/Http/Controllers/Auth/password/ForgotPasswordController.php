<?php

namespace App\Http\Controllers\Auth\password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;

use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /*public function forgot(){
        $credentials = $request->validate([
            'email'=> 'required|email',
        ]);

        Password::sendResetLink($credentials);

        return $this->response()->json(['msg'=>'Reset Password Link sent to your email']);
    }*/

    public function reset() {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

       /// dd($credentials);
        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["msg" => "Invalid token provided"], 400);
        }

        //return response()->json(["msg" => "Password has been successfully changed"]);

        return redirect()->route('login');

    }
}
