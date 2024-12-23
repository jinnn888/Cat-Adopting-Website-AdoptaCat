<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $guarded = ['id'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function images() {
        return $this->hasMany(CatImage::class);
    }

    public function favoriter() {
        return $this->belongsToMany(User::class, 'favourites');
    }
}
