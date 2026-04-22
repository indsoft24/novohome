<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
 use App\Models\Contact;


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
        $products = Product::all();
        return view('collection', compact('products'));
    }

    public function contact()
    {
        $categories = Category::all();
        $contact = Contact::first(); // single record
    
        return view('contact', compact('categories', 'contact'));
    }
 
}