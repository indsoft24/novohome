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

    public function add(Request $request)
{
    if (!auth()->check()) {

        return response()->json([
            'success' => false,
            'message' => 'Please login first'
        ]);
    }

    CartItem::create([
        'product_id' => $request->product_id,
        'qty' => 1,
        'user_id' => auth()->id()
    ]);

    $count = CartItem::where('user_id', auth()->id())->sum('qty');

    return response()->json([
        'success' => true,
        'count' => $count
    ]);
}
}