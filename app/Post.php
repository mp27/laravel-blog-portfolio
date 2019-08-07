<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'slug', 'keywords', 'description', 'category_id', 'published', 'thumbnail'];

    protected $casts = [
        'published' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post');
    }

    public function setSlugAttribute($value)
    {
        $slug = $value;

        if (empty($slug)) {
            $slug = $this->attributes['title'];
        }

        $this->attributes['slug'] = Str::slug($slug, '-');
    }
}
