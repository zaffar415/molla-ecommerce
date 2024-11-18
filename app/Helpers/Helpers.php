<?php 

if(!function_exists('cart')) {
    function cart() {
        $cart = App\Models\Cart::where('user_id', auth()->user()->id)->has('product')->with('product')->get();
        return $cart;
    }
}