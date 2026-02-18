<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTag extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','slug','is_active'];

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_tag', 'blog_tag_id', 'blog_post_id');
    }
}
