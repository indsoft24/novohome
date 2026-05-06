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

    // ================= HOME PAGE =================
    public function home()
    {
        $categories = Category::all();

        // Hero / Slider Products
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

    // ================= PRODUCT REVIEW STORE =================
    public function storeProductReview(Request $request)
    {
        $imageName = null;

        // Image upload
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
    \Log::info($request->all());

    $cart = CartItem::where('product_id', $request->product_id)
        ->where('user_id', session()->getId())
        ->first();   // ✔ IMPORTANT

    if ($cart) {
        $cart->qty += 1;
        $cart->save();
    } else {
        CartItem::create([
            'product_id' => $request->product_id,
            'qty' => 1,
            'user_id' => session()->getId()
        ]);
    }

    $count = CartItem::where('user_id', session()->getId())->sum('qty');

      return response()->json([
          'success' => true,
          'count' => $count
      ]);
      }


    // ================= CART PAGE =================
    public function cart()
    {
        $cartItems = CartItem::with('product')
          ->where('user_id', session()->getId())
          ->get();
        
        \Log::info('USER:', ['id' => auth()->id()]);
        \Log::info('CART:', $cartItems->toArray());
        
        $total = 0;
        
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->qty;
        }
        
        \Log::info('TOTAL:', ['total' => $total]);
        return view('cart', compact('cartItems'));
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
        $cartItems = CartItem::where('user_id', session()->getId())->get();

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

           CartItem::where('user_id', session()->getId())->delete();

        return back()->with('success', 'Order placed successfully!');
    }

    // ================= CHECKOUT PAGE =================
    public function checkoutPage()
        {
        
            $cartItems = CartItem::with('product')
                ->where('user_id', session()->getId())
                ->get();
        
            return view('checkout', compact('cartItems'));
        }

    // ================= PLACE ORDER (USER BASED) =================
    public function placeOrder(Request $request)
    {
        $cartItems = CartItem::with('product')
           ->where('user_id', session()->getId())
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

    
    \Log::info('RAZORPAY ORDER CREATED:', (array) $razorpayOrder);
    \Log::info('DB ORDER CREATED:', $order->toArray());

    return view('payment', [
       'razorpayOrderId' => $razorpayOrder['id'],
       'amount' => $total
    ]);
}

    // ================= PAYMENT SUCCESS =================
public function paymentSuccess(Request $request)
{
    \Log::info('PAYMENT SUCCESS:', $request->all());

    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    try {
        $api->utility->verifyPaymentSignature([
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature
        ]);

        $order = Order::where('razorpay_order_id', $request->razorpay_order_id)->first();

          if (!$order) {
              \Log::error('Order not found', $request->all());
          
              return response()->json([
                  'status' => 'error',
                  'message' => 'Order not found'
              ], 404);
          }

        $order->update([
            'status' => 'completed',
            'payment_id' => $request->razorpay_payment_id
        ]);

        CartItem::where('user_id', session()->getId())->delete();

        return response()->json([
            'status' => 'success'
        ]);

    } catch (\Exception $e) {

        \Log::error($e->getMessage());

        return response()->json([
            'status' => 'error',
            'message' => 'Payment verification failed'
        ], 500);
    }
}

public function cartData()
{
    $cartItems = CartItem::with('product')
        ->where('user_id', auth()->id())
        ->get();

    return response()->json($cartItems);
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

}