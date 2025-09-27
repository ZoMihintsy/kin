<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model { protected $fillable=['name','slug']; public $timestamps=false; 
    public function recipe(){ return $this->hasMany(Recipe::class); }
}
