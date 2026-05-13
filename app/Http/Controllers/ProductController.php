<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

public function edit($id)
{
    $product = Product::findOrFail($id);

    return view('admin.product_edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $product->name = $request->name;
    $product->price = $request->price;

    if($request->hasFile('image')){

        $image = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $image);

        $product->image = $image;
    }

    $product->save();

    return back()->with('success', 'Product Updated Successfully');
}

public function delete($id)
{
    $product = Product::findOrFail($id);

    // image delete (optional)
    if($product->image && file_exists(public_path('images/' . $product->image))){
        unlink(public_path('images/' . $product->image));
    }

    $product->delete();

    return redirect('/admin/products')
            ->with('success', 'Product Deleted Successfully');
}


}
