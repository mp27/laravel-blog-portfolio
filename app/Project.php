<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
