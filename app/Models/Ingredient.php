<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Ingredient extends Model { 
    protected $fillable=['name']; 
    
    public $timestamps=false; 

    public function recipe()
    {
        return $this->belongsToMany(Recipe::class);
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
