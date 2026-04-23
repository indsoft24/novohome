<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\WhatsappSection;


class FrontController extends Controller

{
    public function __construct()
{
    view()->share('products', Product::all());
    view()->share('whatsapp', WhatsappSection::first()); // 🔥 BEST
}

    public function home()
{
    $categories = Category::all();

    $showcase = \App\Models\ShowcaseItem::latest()->take(3)->get();

    $sections = [
        'living',
        'dining',
        'bedroom',
        'shop',
        'office',
        'decor',
        'brands',
        'explore'
    ];

    $sectionData = [];

    foreach ($sections as $sec) {
        $sectionData[$sec] = Product::where('section', $sec)
                                    ->take(4)
                                    ->get();
    }

    return view('home', compact('categories', 'sectionData', 'showcase'));
}


    public function collection()
{
    // sirf 3-3 products show honge
    $venus = Product::where('collection', 'venus')->take(3)->get();
    $arte = Product::where('collection', 'arte')->take(3)->get();
    $luxe = Product::where('collection', 'luxe')->take(3)->get();

    return view('collection', compact('venus', 'arte', 'luxe'));
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


 
}