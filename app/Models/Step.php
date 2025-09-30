<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Step extends Model
{
    //
    protected $fillable = [
        'name',
        'image',
    ];
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
