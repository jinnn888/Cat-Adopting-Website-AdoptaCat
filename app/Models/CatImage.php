<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatImage extends Model
{
    protected $guarded = ['id'];

    public function cat() {
        return $this->belongsTo(Cat::class);
    }

}
