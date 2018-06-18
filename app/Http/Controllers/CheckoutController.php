<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout')->with([
            'discount' => $this->getNumbers()->get('discount'),
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTax' => $this->getNumbers()->get('newTax'),
            'newTotal' => $this->getNumbers()->get('newTotal')
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contents = Cart::content()->map(function ($item){
           return $item->model->slug.', '.$item->model->qty;
        })->values()->toJson();
        try{
            $charge = Stripe::charges()->create([
                'amount' => $this->getNumbers()->get('newTotal'),
                'currency' => 'GBP',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session()->get('coupon'))->toJson(),
                ]
            ]);
            //SUCCESSFUL
            Cart::instance('default')->destroy();
            session()->forget('coupon');

            //return back()->with('success_message','Thank you! Your payment has been successfully accepted!');
            return redirect()->route('confirmation.index')->with('success_message','Thank you! Your payment has been successfully accepted!');
        } catch (\CardErrorException $e) {
            return back()->withErrors('Error! '.$e->getMessage());
        }
    }

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100; //20/100 = 0,20
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (floatval(Cart::subtotal()) - floatval($discount));
        $newTax = $tax * $newSubtotal;
        $newTotal = $newSubtotal * (1 + $tax );

        return collect([
           'tax' => $tax,
           'discount' => number_format($discount, 2),
           'newSubtotal' => number_format($newSubtotal,2),
           'newTax' => number_format($newTax,2),
           'newTotal' => number_format($newTotal,2)
        ]);
    }
}
