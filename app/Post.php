<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';

    protected $with = ['category'];

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

    public function scopePublished($query, $published = true)
    {
        return $query->where('published', $published);
    }

    public function setSlugAttribute($slug)
    {
        if (empty($slug)) {
            $slug = $this->attributes['title'] . ' ' . Str::random(10);
        }

        $this->attributes['slug'] = Str::slug($slug, '-');
    }

}
