<?php

namespace App\Http\Controllers\Emails;

use Mail;

use App\Mail\purchase\SuccessfulPurchaseEmail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function successFullProductPurchase(){
        //return view('partials.emails.purchase-success');
        
        return new SuccessfulPurchaseEmail();
    }
}
