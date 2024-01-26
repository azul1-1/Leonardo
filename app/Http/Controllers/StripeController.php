<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index(){

        return view('indexStripe');

    }

    public function checkout(){

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session=\Stripe\Checkout\Session::create([
            'line_items'=>[
                [
                    'price_data'=>[
                        'currency'=>'gbp',
                        'product_data'=>[
                            'name'=>'Send me money!!!'
                        ],
                        'unit_amount'=>500,//5.00

                    ],
                    'quantity'=>1,
                ],
            ],
            'mode'=>'payment',
            'success_url'=>url('stripeSuccess'),
        ]);

        return redirect()->away($session->url);

    }

    public function success(){




    }
}
