<?php

namespace App\Http\Controllers\Web\User;

use App\History;
use Auth;
use App\Cart;
use App\Order;
use Session;
use App\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::has('cart')){
            return view('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('checkout.index')
            ->withTotal($total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Session::has('cart')){
            return redirect()->route('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_qfHwIKqCAPZy43cd9KYWzATE');
        try{
            $charge = Charge::create([
                "amount" => $cart->totalPrice * 100,
                "currency" => env('CURRENCY_TYPE', 'usd'),
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ]);
            $order = new Order();
            $order->cart = serialize($cart);
            $order->name = $request->input('name');
            $order->address = $request->input('address');
            $order->payment_id = $charge->id;
            Auth::user()->orders()->save($order);

            // history can clear by user due to same data goes into history table

            $history = new History();
            $history->cart = serialize($cart);
            $history->name = $request->input('name');
            $history->address = $request->input('address');
            $history->payment_id = $charge->id;
            Auth::user()->histories()->save($history);

        }catch (\Exception $e){
            return redirect()->route('checkout.index')->withError($e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('home')->withSuccess('successfully purchased');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
