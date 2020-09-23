<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Orderservice;
use Illuminate\Http\Request;

use Cartalyst\Stripe\Laravel\Facades\Stripe;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {


        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'amount'=>'1',
            'source' => $request->stripeToken,
            'description' => 'Test from Laravel new app'
        ]);

        $chargeId = $charge['id'];

        if ($chargeId) {

            Orderservice::create($request->all());
            session()->flash('success_en', ' Payment was done, thanks');
            session()->flash('success_ar', ' تم الدفع بنجاح ');
        } else {

            session()->flash('error_en', ' sorry payment failed');
            session()->flash('error_ar', ' فشل فى الدفع ');
        }

        return redirect()->back();
    }
}
