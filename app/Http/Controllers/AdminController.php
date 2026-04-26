<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        if ($request->email == 'admin@gmail.com' && $request->password == '1234') {
            session(['admin' => true]);
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid Login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function products()
    {
        $products = Product::latest()->get();
        return view('admin.products', compact('products'));
    }

    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.add-product', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'category_id' => $request->category_id
        ]);

        return back()->with('success', 'Product Added');
    }

// show all categories
public function categories()
{
    $categories = Category::all();
    return view('admin.categories', compact('categories'));
}

// store new category
public function storeCategory(Request $request)
{
    Category::create([
        'name' => $request->name,
        'icon' => $request->icon
    ]);

    return back()->with('success', 'Category Added!');
}

public function reviews()
{
    $testimonials = Testimonial::latest()->get();
    return view('admin.testimonials', compact('testimonials'));
}
}


