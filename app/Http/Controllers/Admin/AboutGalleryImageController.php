<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutGalleryImage;
use Illuminate\Http\Request;

class AboutGalleryImageController extends Controller
{
    public function index()
    {
        $galleryImages = AboutGalleryImage::all();
        return view('admin.pages.AboutGalleryImages.index', compact('galleryImages'));
    }

    public function create()
    {
        return view('admin.pages.AboutGalleryImages.create');
    }

    public function store(Request $request)
    {
        $data = [];

        foreach (['image1', 'image2', 'image3', 'image4'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('uploads/gallery', 'public');
            }
        }

        AboutGalleryImage::create($data);

        return redirect()->route('about-gallery-images.index')->with('success', 'Gallery images created successfully.');
    }

    public function show(AboutGalleryImage $aboutGalleryImage)
    {
        return view('admin.pages.AboutGalleryImages.show', compact('aboutGalleryImage'));
    }

    public function edit(AboutGalleryImage $aboutGalleryImage)
    {
        return view('admin.pages.AboutGalleryImages.edit', compact('aboutGalleryImage'));
    }

    public function update(Request $request, AboutGalleryImage $aboutGalleryImage)
    {
        $data = [];

        foreach (['image1', 'image2', 'image3', 'image4'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('uploads/gallery', 'public');
            }
        }

        $aboutGalleryImage->update($data);

        return redirect()->route('about-gallery-images.index')->with('success', 'Gallery images updated successfully.');
    }

    public function destroy(AboutGalleryImage $aboutGalleryImage)
    {
        $aboutGalleryImage->delete();
        return redirect()->route('about-gallery-images.index')->with('success', 'Gallery images deleted successfully.');
    }
}
