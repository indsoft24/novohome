<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:products,name,NULL,id,section,' . $request->section,
        'section' => 'required',
        'image' => 'required'
    ]);

    Product::create($request->all());

    return back()->with('success', 'Product added successfully');
}
}
