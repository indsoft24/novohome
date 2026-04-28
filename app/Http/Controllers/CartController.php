<?php

namespace App\Http\Controllers;

use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->get();
        return view('cart', compact('cartItems'));
    }
}