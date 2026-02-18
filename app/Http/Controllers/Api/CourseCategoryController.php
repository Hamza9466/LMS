<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller
{
    /**
     * 📍 GET /api/course-categories
     * Fetch all categories (with optional search)
     */
    public function index(Request $request)
    {
        try {
            $search = $request->query('q');
            $categories = CourseCategory::when($search, function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('slug', 'like', "%{$search}%");
                })
                ->orderBy('name', 'asc')
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Course categories fetched successfully.',
                'data' => $categories
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * 📍 POST /api/course-categories
     * Create new category
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'        => 'required|string|max:255|unique:course_categories,name',
                'slug'        => 'nullable|string|max:255|unique:course_categories,slug',
                'description' => 'nullable|string',
                'image'       => 'nullable|image|max:2048'
            ]);

            $slug = $request->slug ?: Str::slug($request->name);

            // Upload image if provided
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('course_categories', 'public');
            }

            $category = CourseCategory::create([
                'name'        => $request->name,
                'slug'        => $slug,
                'description' => $request->description,
                'image'       => $imagePath,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Category created successfully.',
                'data' => $category
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * 📍 GET /api/course-categories/{id}
     * Show single category details
     */
    public function show($id)
    {
        $category = CourseCategory::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found.'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Category fetched successfully.',
            'data' => $category
        ], 200);
    }

    /**
     * 📍 PUT /api/course-categories/{id}
     * Update category
     */
    public function update(Request $request, $id)
    {
        $category = CourseCategory::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found.'
            ], 404);
        }

        $request->validate([
            'name'        => 'required|string|max:255|unique:course_categories,name,' . $id,
            'slug'        => 'nullable|string|max:255|unique:course_categories,slug,' . $id,
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048'
        ]);

        $slug = $request->slug ?: Str::slug($request->name);

        // Handle image update
        $imagePath = $category->image;
        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('course_categories', 'public');
        }

        $category->update([
            'name'        => $request->name,
            'slug'        => $slug,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Category updated successfully.',
            'data' => $category
        ], 200);
    }

    /**
     * 📍 DELETE /api/course-categories/{id}
     * Delete category
     */
    public function destroy($id)
    {
        $category = CourseCategory::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found.'
            ], 404);
        }

        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully.'
        ], 200);
    }
}