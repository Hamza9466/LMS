<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\BlogCategory;
use App\Models\TeacherDetail;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BloController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['teacher','tags','categories'])
            ->latest('published_at')
            ->latest()
            ->paginate(12);

        return view('admin.pages.Blog.index', [
            'posts' => $posts,
            'nav'   => $this->getNav(),
        ]);
    }

    public function create()
    {
        $teachers = TeacherDetail::select('id','first_name','last_name','username')->orderBy('first_name')->get();
        $categories = BlogCategory::all(); // ✅ add this

        return view('admin.pages.Blog.create', [
            'teachers' => $teachers,
            'categories' => $categories, // ✅ pass categories
            'nav'      => $this->getNav(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'teacher_detail_id' => ['required','exists:teacher_details,id'],
            'title'             => ['required','string','max:200'],
            'slug'              => ['nullable','string','max:220','unique:blog_posts,slug'],
            'feature_image'     => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],
            'feature_image_alt' => ['nullable','string','max:255'],
            'short_description' => ['nullable','string','max:500'],
            'long_description'  => ['nullable','string'],
            'quotation'         => ['nullable','string'],
            'published_at'      => ['nullable','date'],
            'status'            => ['required','in:draft,scheduled,published,archived'],
            'is_featured'       => ['nullable','boolean'],
            'tags'              => ['nullable','string'],
            'categories'        => ['nullable','array'], // ✅ new
            'categories.*'      => ['exists:blog_categories,id'], // ✅ validate each
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);

        if ($request->hasFile('feature_image')) {
            $data['feature_image'] = $request->file('feature_image')->store('blog', 'public');
        }

        $post = BlogPost::create($data);

        $this->syncTags($post, $request->input('tags'));
        $this->syncCategories($post, $request->input('categories')); // ✅ sync categories

        return redirect()->route('admin.blog.index')->with('success', 'Post created.');
    }

    public function edit(BlogPost $blog)
    {
        $teachers = TeacherDetail::select('id','first_name','last_name','username')->orderBy('first_name')->get();
        $categories = BlogCategory::all(); // ✅ add categories
        $tagsCsv = $blog->tags()->pluck('name')->implode(', ');

        return view('admin.pages.Blog.edit', [
            'post'      => $blog,
            'teachers'  => $teachers,
            'categories'=> $categories, // ✅ pass categories
            'tagsCsv'   => $tagsCsv,
            'nav'       => $this->getNav(),
        ]);
    }

    public function update(Request $request, BlogPost $blog)
    {
        $data = $request->validate([
            'teacher_detail_id' => ['required','exists:teacher_details,id'],
            'title'             => ['required','string','max:200'],
            'slug'              => ['nullable','string','max:220','unique:blog_posts,slug,' . $blog->id],
            'feature_image'     => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],
            'feature_image_alt' => ['nullable','string','max:255'],
            'short_description' => ['nullable','string','max:500'],
            'long_description'  => ['nullable','string'],
            'quotation'         => ['nullable','string'],
            'published_at'      => ['nullable','date'],
            'status'            => ['required','in:draft,scheduled,published,archived'],
            'is_featured'       => ['nullable','boolean'],
            'tags'              => ['nullable','string'],
            'categories'        => ['nullable','array'], // ✅ new
            'categories.*'      => ['exists:blog_categories,id'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);

        if ($request->hasFile('feature_image')) {
            if ($blog->feature_image) {
                Storage::disk('public')->delete($blog->feature_image);
            }
            $data['feature_image'] = $request->file('feature_image')->store('blog', 'public');
        }

        $blog->update($data);

        $this->syncTags($blog, $request->input('tags'));
        $this->syncCategories($blog, $request->input('categories')); // ✅ sync categories

        return redirect()->route('admin.blog.index')->with('success', 'Post updated.');
    }
    public function show(BlogPost $blog)
{
    $blog->load(['categories', 'teacher']); 
    return view('admin.pages.Blog.show', [
        'post' => $blog,
        'nav'  => $this->getNav(),
    ]);
}


    public function destroy(BlogPost $blog)
    {
        if ($blog->feature_image) {
            Storage::disk('public')->delete($blog->feature_image);
        }
        $blog->tags()->detach();
        $blog->categories()->detach(); // ✅ detach categories
        $blog->delete();

        return back()->with('success', 'Post deleted.');
    }

    private function syncTags(BlogPost $post, ?string $tagsCsv): void
    {
        $ids = [];
        if ($tagsCsv) {
            $tags = collect(explode(',', $tagsCsv))
                ->map(fn($t) => trim($t))
                ->filter()
                ->unique();

            foreach ($tags as $name) {
                $tag = BlogTag::firstOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name, 'is_active' => true]
                );
                $ids[] = $tag->id;
            }
        }
        $post->tags()->sync($ids);
    }

    private function syncCategories(BlogPost $post, ?array $categoryIds): void
    {
        $post->categories()->sync($categoryIds ?? []);
    }

    private function getNav()
    {
        return Course::select('id','title','slug')->latest()->take(10)->get();
    }
}
