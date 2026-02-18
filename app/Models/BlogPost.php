<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'teacher_detail_id',
        'title', 'slug',
        'feature_image', 'feature_image_alt',
        'short_description', 'long_description', 'quotation',
        'published_at', 'status', 'is_featured', 'views',
        'meta_title', 'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured'  => 'boolean',
    ];

    public function teacher()
    {
        return $this->belongsTo(\App\Models\TeacherDetail::class, 'teacher_detail_id');
    }

    // Base relations
    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_tag', 'blog_post_id', 'blog_tag_id');
    }

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_post_category', 'blog_post_id', 'blog_category_id');
    }

    // ✅ Aliases so existing controller code using blogCategories/blogTags works without changing anything else
    public function blogCategories()
    {
        return $this->categories();
    }

    public function blogTags()
    {
        return $this->tags();
    }

    // Scope for published posts
    public function scopePublished($q)
    {
        return $q->where('status', 'published')
                 ->whereNotNull('published_at')
                 ->where('published_at', '<=', now());
    }
}
