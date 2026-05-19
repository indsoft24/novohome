<?php

namespace App\Http\Controllers;

// ================= MODELS IMPORT =================
use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\WhatsappSection;
use App\Models\Brand;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\Blog;
use App\Models\OrderItem;
use Razorpay\Api\Errors\SignatureVerificationError;
use App\Models\Explore;

// ================= CORE =================
use Illuminate\Http\Request;
use Razorpay\Api\Api;


class FrontController extends Controller
{
    // ================= GLOBAL SHARED DATA =================
    public function __construct()
    {
        view()->share('whatsapp', WhatsappSection::first());
        view()->share('brands', \App\Models\Brand::all()); // Global brands
    }

    public function home()
{
    $categories = Category::all();

    // Latest products
    $products = Product::latest()->take(12)->get();

    // Category-wise products
    $sofas = Product::where('category_id', 1)->get();
    $chairs = Product::where('category_id', 2)->get();
    $beds = Product::where('category_id', 3)->get();
    $tables = Product::where('category_id', 4)->get();

    // Section-wise products
    $sections = ['living','dining','bedroom','shop','office','decor'];
    $sectionData = [];

    foreach ($sections as $sec) {
        $sectionData[$sec] = Product::where('section', $sec)
                                    ->take(4)
                                    ->get();
    }

    // Extra sections
    $showcase = \App\Models\ShowcaseItem::latest()->take(3)->get();
    $testimonials = Testimonial::latest()->latest()->take(6)->get();
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
    // ================= PRODUCT REVIEW STORE =================
   public function storeProductReview(Request $request)
{
    $request->validate([
        'name' => 'required',
        'message' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $testimonial = new Testimonial();

    $testimonial->product_id = $request->product_id;
    $testimonial->name = $request->name;
    $testimonial->message = $request->message;

    if($request->hasFile('image')){

        $image = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $image);

        $testimonial->image = $image;
    }

    $testimonial->save();

    return back()->with('success', 'Review Submitted');
}

    // ================= COLLECTION PAGE =================
    public function collection()
    {
        $venus = Product::where('collection', 'venus')->take(3)->get();
        $arte = Product::where('collection', 'arte')->take(3)->get();
        $luxe = Product::where('collection', 'luxe')->take(3)->get();

        $categories = Category::all();

        return view('collection', compact('venus', 'arte', 'luxe', 'categories'));
    }

    // ================= COLLECTION VIEW MORE =================
    public function collectionViewMore($type)
    {
        $products = Product::whereRaw('LOWER(collection) = ?', [strtolower($type)])->get();
        $testimonials = Testimonial::latest()->take(3)->get();

        return view('collection-more', compact('products', 'type', 'testimonials'));
    }

    // ================= CONTACT PAGE =================
    public function contact()
    {
        $categories = Category::all();
        $contact = Contact::first();

        return view('contact', compact('categories', 'contact'));
    }

    // ================= CATEGORY PAGE =================
    public function categoryView($id)
    {
        $category = Category::findOrFail($id);

        $products = Product::where('category_id', $id)->get();

        $relatedProducts = Product::where('category_id', $id)
                                  ->inRandomOrder()
                                  ->take(3)
                                  ->get();

        return view('category', compact('products', 'category', 'relatedProducts'));
    }

    // ================= SECTION PAGE =================
    public function sectionPage($type)
    {
        $products = Product::where('section', $type)->get();
        $testimonials = Testimonial::latest()->take(3)->get();

        return view('section-page', compact('products', 'type', 'testimonials'));
    }

    // ================= PRODUCT DETAIL =================
    public function productDetail($id)
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)
                                  ->where('id', '!=', $id)
                                  ->take(4)
                                  ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }

    // ================= MANUAL ORDER STORE =================
    public function store(Request $request)
    {
        Order::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'qty' => $request->qty,
            'total' => 0,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Order placed successfully!');
    }

    // ================= ADD TO CART =================
 public function addToCart(Request $request)
{
    $cart = CartItem::where('product_id', $request->product_id)
        ->where('user_id', auth()->id())
        ->first();

    if ($cart) {

        $cart->qty += 1;
        $cart->save();

    } else {

        CartItem::create([
            'product_id' => $request->product_id,
            'qty' => 1,
            'user_id' => auth()->id()
        ]);
    }

    $count = CartItem::where('user_id', auth()->id())->sum('qty');

    return response()->json([
        'success' => true,
        'count' => $count
    ]);
}

    // ================= CART PAGE =================
    public function cart()
    {
        $cartItems = CartItem::with('product')
          ->where('user_id', auth()->id())
          ->get();
        
        \Log::info('USER:', ['id' => auth()->id()]);
        \Log::info('CART:', $cartItems->toArray());
        
        $total = 0;
        
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->qty;
        }
        
        \Log::info('TOTAL:', ['total' => $total]);
        return view('cart', compact('cartItems', 'total'));
    }

    // ================= REMOVE CART ITEM =================
    public function removeCart($id)
    {
        CartItem::where('id', $id)
          ->where('user_id', auth()->id())
          ->delete();
        return back();
    }

    // ================= CHECKOUT PROCESS =================
    public function checkout()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->get();

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

           CartItem::where('user_id', auth()->id())->delete();

        return back()->with('success', 'Order placed successfully!');
    }

    // ================= CHECKOUT PAGE =================
    public function checkoutPage()
{
    $cartItems = CartItem::with('product')
        ->where('user_id', auth()->id())
        ->get();

    $total = 0;

    foreach ($cartItems as $item) {

        $total += $item->product->price * $item->qty;
    }

    return view('checkout', compact('cartItems', 'total'));
}

    // ================= PLACE ORDER (USER BASED) =================
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
    
        // ✅ YAHI FIX HAI
        CartItem::where('user_id', auth()->id())->delete();
    
        return redirect('/order-success');
    }


    // ================= BLOG =================
    public function blog()
    {
        $blogs = Blog::latest()->get();
        return view('blog', compact('blogs'));
    }

    // ================= BLOG DETAIL =================
    public function blogDetail($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog-detail', compact('blog'));
    }

    // ================= PAYMENT INITIATE =================
 public function pay(Request $request)
{

    $cartItems = CartItem::with('product')
        ->where('user_id', auth()->id())
        ->get();

    if ($cartItems->isEmpty()) {
        return back()->with('error', 'Cart is empty');
    }

    $total = 0;

    foreach ($cartItems as $item) {
        $total += $item->product->price * $item->qty;
    }

    if ($total <= 0) {
        return back()->with('error', 'Invalid amount');
    }

    $amountInPaise = $total * 100;

    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    $razorpayOrder = $api->order->create([
        'receipt' => 'order_' . time(),
        'amount' => $amountInPaise,
        'currency' => 'INR'
    ]);

    $order = Order::create([
        'user_id' => auth()->id(),   // 🔥 ADD THIS
        'name' => $request->name,
        'product_id' => $cartItems->first()->product_id,
        'phone' => $request->phone,
        'address' => $request->address,
        'qty' => $cartItems->sum('qty'),
        'total' => $total,
        'status' => 'pending',
        'razorpay_order_id' => $razorpayOrder['id']
    ]);

    foreach ($cartItems as $item) {
    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $item->product_id,
        'product_name' => $item->product->name,
        'qty' => $item->qty,
        'price' => $item->product->price,
        'total' => $item->product->price * $item->qty
    ]);
}

    $amountInPaise = (int) ($total * 100);

\Log::info('TOTAL:', ['total' => $total]);
\Log::info('AMOUNT IN PAISE:', ['amount' => $amountInPaise]);

$api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

$razorpayOrder = $api->order->create([
    'receipt' => 'order_' . time(),
    'amount' => $amountInPaise,
    'currency' => 'INR'
]);
}

    // ================= PAYMENT SUCCESS =================
public function paymentSuccess(Request $request)
{
    // ✅ FETCH JSON FIX
    $data = $request->json()->all();
    $request->merge($data);
    \Log::info('PAYMENT SUCCESS:', $request->all());
    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    try {

        // Verify signature
        $api->utility->verifyPaymentSignature([
            'razorpay_order_id'   => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature'  => $request->razorpay_signature
        ]);

        // Find order
        $order = Order::where('razorpay_order_id', $request->razorpay_order_id)->first();

        if (!$order) {
            \Log::error('ORDER NOT FOUND', $request->all());

            return response()->json([
                'status' => 'error',
                'message' => 'Order not found'
            ], 404);
        }

        // Update order ONCE
        $order->update([
            'status' => 'completed',
            'payment_id' => $request->razorpay_payment_id
        ]);

        \Log::info('ORDER UPDATED SUCCESSFULLY');

        // Clear cart (better approach)
        CartItem::where('user_id', $order->user_id)->delete();

        return response()->json([
            'status' => 'success',
            'redirect' => url('/order-success/'.$order->id)
        ]);

    } catch (\Exception $e) {

        \Log::error('PAYMENT FAILED: ' . $e->getMessage());

        return response()->json([
            'status' => 'error',
            'message' => 'Payment verification failed'
        ], 500);
    }
}


public function cartData()
{
    if (!auth()->check()) {

        return response()->json([]);
    }

    $cart = CartItem::with('product')
        ->where('user_id', auth()->id())
        ->get();

    return response()->json($cart);
}

public function getCart()
{
    $cartItems = CartItem::with('product')
        ->where('user_id', auth()->id()) // 🔥 IMPORTANT
        ->get();

    return response()->json($cartItems);
}

public function updateCart(Request $request)
{
    $cart = CartItem::where('id', $request->id)
        ->where('user_id', auth()->id())
        ->first();

    if ($cart) {
        $cart->qty = $request->qty;
        $cart->save();
    }

    return response()->json(['success' => true]);
}

public function explorePage($slug)
{
    $page = Explore::where('slug', $slug)->firstOrFail();

    return view('explore.page', compact('page'));
}

public function trackOrder(Request $request)
{
    $order = null;

    if($request->order_id){

        $order = Order::where('id', $request->order_id)
            ->orWhere('razorpay_order_id', $request->order_id)
            ->first();
    }

    return view('track-order', compact('order'));
}

public function brandPage($id)
{
    $brand = Brand::findOrFail($id);

    $products = Product::where('brand_id', $id)->get();

    return view('brand-page', compact('brand', 'products'));
}

}