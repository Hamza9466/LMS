<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Str; // optional if you prefer Str::slug()

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::latest()->get();
        return view('admin.pages.blog_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.blog_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
        ]);

        BlogCategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return redirect()->route('admin.blog-categories.index')->with('success','Category created.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.pages.blog_categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,'.$blogCategory->id,
        ]);

        $blogCategory->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return redirect()->route('admin.blog-categories.index')->with('success','Category updated.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->route('admin.blog-categories.index')->with('success','Category deleted.');
    }
}