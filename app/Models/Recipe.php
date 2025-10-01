<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Recipe extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'title',
        'slug',
        'description',
        'steps',
        'hours',
        'difficult'
    ];
    public function user(){ return $this->belongsTo(User::class); }
    public function tag(){ return $this->belongsToMany(Tag::class); }
    public function step(){return $this->hasMany(Step::class); }
    public function ingredient(){ return $this->belongsToMany(Ingredient::class); }
}
