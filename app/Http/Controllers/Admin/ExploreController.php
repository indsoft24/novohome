<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Explore;

class ExploreController extends Controller
{
    public function index()
    {
        $pages = Explore::latest()->get();

        return view('admin.explore.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.explore.create');
    }

    public function store(Request $request)
    {
        $banner = null;

        if($request->hasFile('banner')){

            $banner = time().'.'.$request->banner->extension();

            $request->banner->move(public_path('images'), $banner);
        }

        Explore::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category' => $request->category,
            'content' => $request->content,
            'banner' => $banner
        ]);

        return redirect('/admin/explore');
    }

    public function edit($id)
    {
        $page = Explore::findOrFail($id);

        return view('admin.explore.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Explore::findOrFail($id);

        $banner = $page->banner;

        if($request->hasFile('banner')){

            $banner = time().'.'.$request->banner->extension();

            $request->banner->move(public_path('images'), $banner);
        }

        $page->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'category' => $request->category,
            'content' => $request->content,
            'banner' => $banner
        ]);

        return redirect('/admin/explore');
    }

    public function delete($id)
    {
        Explore::findOrFail($id)->delete();

        return back();
    }
}