<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutBannerController extends Controller
{
    public function index()
    {
        $banners = AboutBanner::all();
        return view('admin.pages.AboutBanner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.pages.AboutBanner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'text1' => 'required|string|max:255',
            'text2' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['text1', 'text2']);

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('about_banners', 'public');
        }

        AboutBanner::create($data);

        return redirect()->route('admin.about-banners.index')->with('success', 'Banner created successfully!');
    }

    public function show(AboutBanner $aboutBanner)
    {
        return view('admin.pages.AboutBanner.show', compact('aboutBanner'));
    }

    public function edit(AboutBanner $aboutBanner)
    {
        return view('admin.pages.AboutBanner.edit', compact('aboutBanner'));
    }

    public function update(Request $request, AboutBanner $aboutBanner)
    {
        $request->validate([
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'text1' => 'required|string|max:255',
            'text2' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['text1', 'text2']);

        if ($request->hasFile('banner_image')) {
            if ($aboutBanner->banner_image) {
                Storage::disk('public')->delete($aboutBanner->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('about_banners', 'public');
        }

        $aboutBanner->update($data);

        return redirect()->route('admin.about-banners.index')->with('success', 'Banner updated successfully!');
    }

    public function destroy(AboutBanner $aboutBanner)
    {
        if ($aboutBanner->banner_image) {
            Storage::disk('public')->delete($aboutBanner->banner_image);
        }

        $aboutBanner->delete();

        return redirect()->route('admin.about-banners.index')->with('success', 'Banner deleted successfully!');
    }
}
