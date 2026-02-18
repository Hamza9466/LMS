<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPost;
use Illuminate\Http\Request;

class AboutPostController extends Controller
{
    public function index()
    {
        $aboutPosts = AboutPost::all();
        return view('admin.pages.AboutPost.index', compact('aboutPosts'));
    }

    public function create()
    {
        return view('admin.pages.AboutPost.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'heading' => 'nullable|string|max:255',
            'shortdescription' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about_images', 'public');
        }

        AboutPost::create($data);

        return redirect()->route('about-posts.index')->with('success', 'About Post created successfully.');
    }

    public function show(AboutPost $aboutPost)
    {
        return view('admin.pages.AboutPost.show', compact('aboutPost'));
    }

    public function edit(AboutPost $aboutPost)
    {
        return view('admin.pages.AboutPost.edit', compact('aboutPost'));
    }

    public function update(Request $request, AboutPost $aboutPost)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'heading' => 'nullable|string|max:255',
            'shortdescription' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about_images', 'public');
        }

        $aboutPost->update($data);

        return redirect()->route('about-posts.index')->with('success', 'About Post updated successfully.');
    }

    public function destroy(AboutPost $aboutPost)
    {
        $aboutPost->delete();
        return redirect()->route('about-posts.index')->with('success', 'About Post deleted successfully.');
    }
}
