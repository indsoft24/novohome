<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Support\Str;


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
    $slug = Str::slug($request->name);

    // 🔥 duplicate slug fix
    $count = Category::where('slug', 'LIKE', "$slug%")->count();
    if ($count > 0) {
        $slug = $slug . '-' . ($count + 1);
    }

    // 🔥 image upload
    $imageName = null;

    if ($request->hasFile('icon')) {
        $imageName = time().'.'.$request->icon->extension();
        $request->icon->move(public_path('images'), $imageName);
    }

    // ✅ correct save
    Category::create([
        'name' => $request->name,
        'slug' => $slug,
        'icon' => $imageName   // ✅ FIXED
    ]);

    return back()->with('success', 'Category Added!');
}

public function reviews()
{
    $testimonials = Testimonial::latest()->get();
    return view('admin.testimonials', compact('testimonials'));
}

// EDIT PAGE
public function editCategory($id)
{
    $category = Category::findOrFail($id);
    return view('admin.edit-category', compact('category'));
}

// UPDATE
public function updateCategory(Request $request, $id)
{
    $category = Category::findOrFail($id);

    // slug
    $slug = $request->slug ?? Str::slug($request->name);

    // default old image
    $imageName = $category->icon;

    // new image upload
    if ($request->hasFile('icon')) {

        // OLD IMAGE DELETE (important)
        if ($category->icon && file_exists(public_path('images/'.$category->icon))) {
            unlink(public_path('images/'.$category->icon));
        }

        // NEW IMAGE SAVE
        $imageName = time().'.'.$request->icon->extension();
        $request->icon->move(public_path('images'), $imageName);
    }

    // UPDATE
    $category->update([
        'name' => $request->name,
        'slug' => $slug,
        'icon' => $imageName
    ]);

    return redirect('/admin/categories')->with('success', 'Category Updated!');
}

public function update(Request $request, $id)
{
    $product = Product::find($id);

    $product->name = $request->name;
    $product->price = $request->price;
    $product->category_id = $request->category_id;

    if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $filename);
        $product->image = $filename;
    }

    $product->save();

    return redirect('/admin/products')->with('success', 'Product updated');
}

// DELETE
public function deleteCategory($id)
{
    Category::findOrFail($id)->delete();

    return back()->with('success', 'Category Deleted!');
}
}


