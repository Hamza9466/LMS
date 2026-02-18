<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutIconController extends Controller
{
    public function index()
    {
        $aboutIcons = AboutIcon::all();
        return view('admin.pages.AboutIcons.index', compact('aboutIcons'));
    }

    public function create()
    {
        return view('admin.pages.AboutIcons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'digits' => 'nullable|string|max:255',
            'shortdescription' => 'nullable|string',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('about_icons', 'public');
        }

        AboutIcon::create([
            'icon' => $iconPath,
            'digits' => $request->digits,
            'shortdescription' => $request->shortdescription,
        ]);

        return redirect()->route('admin.about-icons.index')
                         ->with('success', 'About Icon created successfully.');
    }

    public function show(AboutIcon $aboutIcon)
    {
        return view('admin.pages.AboutIcons.show', compact('aboutIcon'));
    }

    public function edit(AboutIcon $aboutIcon)
    {
        return view('admin.pages.AboutIcons.edit', compact('aboutIcon'));
    }

    public function update(Request $request, AboutIcon $aboutIcon)
    {
        $request->validate([
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'digits' => 'nullable|string|max:255',
            'shortdescription' => 'nullable|string',
        ]);

        $iconPath = $aboutIcon->icon;

        if ($request->hasFile('icon')) {
            // Delete old file if exists
            if ($aboutIcon->icon && Storage::disk('public')->exists($aboutIcon->icon)) {
                Storage::disk('public')->delete($aboutIcon->icon);
            }

            // Store new file
            $iconPath = $request->file('icon')->store('about_icons', 'public');
        }

        $aboutIcon->update([
            'icon' => $iconPath,
            'digits' => $request->digits,
            'shortdescription' => $request->shortdescription,
        ]);

        return redirect()->route('admin.about-icons.index')
                         ->with('success', 'About Icon updated successfully.');
    }

    public function destroy(AboutIcon $aboutIcon)
    {
        if ($aboutIcon->icon && Storage::disk('public')->exists($aboutIcon->icon)) {
            Storage::disk('public')->delete($aboutIcon->icon);
        }

        $aboutIcon->delete();

        return redirect()->route('admin.about-icons.index')
                         ->with('success', 'About Icon deleted successfully.');
    }
}
