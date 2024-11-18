<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{    
    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $cart = cart();        
        return view('cart',['title' => 'Cart', 'cart' => $cart]);
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
        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'sometimes',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $cart = Cart::where('user_id', $input['user_id'])->where('product_id', $input['product_id'])->first();
        if($cart) {
            $cart->update([
                'quantity' => $cart->quantity + 1,
            ]);
        } else {                        
            Cart::create($input);
        }

        return redirect()->back()->with(['success' => 'Added to cart Successfully' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'sometimes',
        ]);

        $input = $request->all();
        
        $cart->update([
            'quantity' => $input['quantity'],
        ]);

        $price = $cart->product->sale_price ? $cart->product->sale_price : $cart->product->price;
        $html = '$'. $price * $input['quantity'];

        // return redirect()->back()->withSuccess( 'Added to cart Successfully' );
        return response()->json([
            'status' => 1,
            'html' => $html
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json([
            'status' => 1,
        ]);
    }
}
