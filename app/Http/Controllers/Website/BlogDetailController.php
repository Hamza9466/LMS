<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\Course;

class BlogDetailController extends Controller
{
    public function BlogDetail(string $slug)
    {
        // Navbar courses
        $nav = Course::all();

        // Current blog post with categories and tags
        $blog = BlogPost::with(['blogCategories:id,name,slug','blogTags:id,name,slug'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Previous post
        $previousPost = BlogPost::where('published_at', '<', $blog->published_at ?? $blog->created_at)
            ->orderBy('published_at', 'desc')
            ->first()
            ?? BlogPost::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();

        // Next post
        $nextPost = BlogPost::where('published_at', '>', $blog->published_at ?? $blog->created_at)
            ->orderBy('published_at', 'asc')
            ->first()
            ?? BlogPost::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();

        // Related posts (based on categories)
        $categoryIds = $blog->blogCategories->pluck('id')->all();

        $relatedPosts = BlogPost::published()
            ->select('id','slug','title','feature_image','feature_image_alt','quotation','published_at','created_at')
            ->whereKeyNot($blog->id)
            ->when(!empty($categoryIds), function ($q) use ($categoryIds) {
                $q->whereHas('blogCategories', fn($qq) => $qq->whereIn('blog_categories.id', $categoryIds));
            })
            ->orderByDesc('published_at')
            ->latest('created_at')
            ->take(4)
            ->get();

        if ($relatedPosts->isEmpty() && empty($categoryIds)) {
            $relatedPosts = BlogPost::published()
                ->select('id','slug','title','feature_image','feature_image_alt','quotation','published_at','created_at')
                ->whereKeyNot($blog->id)
                ->orderByDesc('published_at')
                ->latest('created_at')
                ->take(3)
                ->get();
        }

        // All categories with post counts
        $allCategories = BlogCategory::withCount('posts')->get();

        // Latest 3 posts (robustly using published_at or created_at)
        $latestPosts = BlogPost::published()
            ->select('id','slug','title','feature_image','feature_image_alt','published_at','created_at')
            ->orderByRaw('COALESCE(published_at, created_at) DESC')
            ->take(3)
            ->get();

        return view('website.pages.blog-detail', compact(
            'nav',
            'blog',
            'previousPost',
            'nextPost',
            'relatedPosts',
            'allCategories',
            'latestPosts'
        ));
    }
}