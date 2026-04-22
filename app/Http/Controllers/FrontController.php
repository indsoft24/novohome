<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Testimonial;


class FrontController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $showcase = \App\Models\ShowcaseItem::latest()->take(3)->get();

        return view('home', compact('categories', 'showcase'));
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



 
}