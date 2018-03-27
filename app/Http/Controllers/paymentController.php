<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
class paymentController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public static function home(){
    	return view('payment.payment')->with("payment",PaymentMethod::all());
    }
}
