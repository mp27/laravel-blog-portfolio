<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'subscribers';
    protected $fillable = ['name', 'email'];

    public function scopeSubscribed($query)
    {
        return $query->where('subscribed', true);
    }
}
