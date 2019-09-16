<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";

    protected $fillable = ["name", "description"];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_project');
    }
}
