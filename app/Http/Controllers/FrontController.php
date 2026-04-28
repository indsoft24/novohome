<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\WhatsappSection;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\Blog;



class FrontController extends Controller

{
    public function __construct()
{
    view()->share('whatsapp', WhatsappSection::first());
    view()->share('brands', \App\Models\Brand::all()); // ✅ ADD THIS
}

   public function home()
{
    $categories = Category::all();

    // 🔥 HERO / SLIDER ke liye
    $products = Product::latest()->take(12)->get();

    // 🔥 CATEGORY wise (important for homepage)
    $sofas = Product::where('category_id', 1)->get();
    $chairs = Product::where('category_id', 2)->get();
    $beds = Product::where('category_id', 3)->get();
    $tables = Product::where('category_id', 4)->get();

    // 🔥 SECTION wise (tum already use kar rahe ho)
    $sections = [
        'living',
        'dining',
        'bedroom',
        'shop',
        'office',
        'decor'
    ];

    $sectionData = [];

    foreach ($sections as $sec) {
        $sectionData[$sec] = Product::where('section', $sec)
                                    ->take(4)
                                    ->get();
    }

    // 🔥 SHOWCASE
    $showcase = \App\Models\ShowcaseItem::latest()->take(3)->get();
    $testimonials = Testimonial::latest()->take(6)->get();
    $brands = Brand::latest()->get();

    return view('home', compact(
        'categories',
        'products',
        'sofas',
        'chairs',
        'beds',
        'tables',
        'sectionData',
        'showcase',
        'testimonials',
        'brands' 
    ));
}

public function storeProductReview(Request $request)
{
    $imageName = null;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }

    Testimonial::create([
        'product_id' => $request->product_id,
        'name' => $request->name,
        'message' => $request->message,
        'image' => $imageName
    ]);

    return back()->with('success', 'Review Added!');
}

 public function collection()
{
    $venus = Product::where('collection', 'venus')->take(3)->get();
    $arte = Product::where('collection', 'arte')->take(3)->get();
    $luxe = Product::where('collection', 'luxe')->take(3)->get();

    $categories = Category::all(); // 👈 ADD THIS

    return view('collection', compact('venus', 'arte', 'luxe', 'categories'));
}

public function collectionViewMore($type)
{
    $products = Product::whereRaw('LOWER(collection) = ?', [strtolower($type)])->get();

    $testimonials = Testimonial::latest()->take(3)->get();

    return view('collection-more', compact('products', 'type', 'testimonials'));
}

    public function contact()
    {
        $categories = Category::all();
        $contact = Contact::first(); // single record
    
        return view('contact', compact('categories', 'contact'));
    }

public function categoryView($id)
{
    $category = Category::findOrFail($id);

    $products = Product::where('category_id', $id)->get();

    // 🔥 Related products (same category ya random)
    $relatedProducts = Product::where('category_id', $id)
                              ->inRandomOrder()
                              ->take(3)
                              ->get();

    return view('category', compact('products', 'category', 'relatedProducts'));
}

public function sectionPage($type)
{
    $products = Product::where('section', $type)->get();
    $testimonials = Testimonial::latest()->take(3)->get();

    return view('section-page', compact('products', 'type', 'testimonials'));
}

public function productDetail($id)
{
    $product = Product::findOrFail($id);

    $relatedProducts = Product::where('category_id', $product->category_id)
                              ->where('id', '!=', $id)
                              ->take(4)
                              ->get();

    return view('product-detail', compact('product', 'relatedProducts'));
}

 public function store(Request $request)
{
    Order::create([
        'product_id' => $request->product_id,
        'name' => $request->name,
        'phone' => $request->phone,
        'address' => $request->address,
        'qty' => $request->qty,
        'total' => 0, // ya calculate kar sakte ho
        'status' => 'pending'
    ]);

    return back()->with('success', 'Order placed successfully!');
}


public function addToCart(Request $request)
{
    \Log::info($request->all()); // 🔥 check log

    $cart = CartItem::where('product_id', $request->product_id)->first();

    if ($cart) {
        $cart->qty += 1;
        $cart->save();
    } else {
        CartItem::create([
            'product_id' => $request->product_id,
            'qty' => 1
        ]);
    }

    return response()->json(['success' => true]);
}

public function cart()
{
    $cartItems = CartItem::with('product')->get();
    return view('cart', compact('cartItems'));
}


public function product()
{
    return $this->belongsTo(Product::class);
}


public function checkout()
{
    $cartItems = CartItem::all();

    foreach ($cartItems as $item) {

        $product = Product::find($item->product_id);

        Order::create([
            'product_id' => $item->product_id,
            'name' => 'Guest',
            'phone' => '',
            'address' => '',
            'qty' => $item->qty,
            'total' => $product->price * $item->qty,
            'status' => 'pending'
        ]);
    }

    CartItem::truncate();

    return back()->with('success', 'Order placed successfully!');
}

public function removeCart($id)
{
    CartItem::find($id)->delete();
    return back();
}

public function checkoutPage()
{
    $cartItems = CartItem::with('product')->get();
    return view('checkout', compact('cartItems'));
}

public function placeOrder(Request $request)
{
    $cartItems = CartItem::with('product')
    ->where('user_id', auth()->id())
    ->get();

        foreach ($cartItems as $item) {
             Order::create([
                 'product_id' => $item->product_id,
                 'name' => $request->name,
                 'phone' => $request->phone,
                 'address' => $request->address,
                 'qty' => $item->qty,
                 'total' => (float)$item->product->price * (int)$item->qty,
                 'status' => 'pending'
             ]);
         }
         
         // 👉 loop ke baad
         CartItem::where('user_id', auth()->id())->delete();
         
         return redirect('/order-success');

    // 🔥 CLEAR CART
    CartItem::truncate();

    return redirect('/')->with('success', 'Order Placed Successfully!');
}


public function blog()
{
    $blogs = Blog::latest()->get();

    return view('blog', compact('blogs'));
}

public function blogDetail($id)
{
    $blog = Blog::findOrFail($id);

    return view('blog-detail', compact('blog'));
}

}