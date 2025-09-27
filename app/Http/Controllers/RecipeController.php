<?php
namespace App\Http\Controllers;

use App\Models\{Recipe, Ingredient, Tag};
use App\Http\Requests\StoreRecipeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function index(Request $r){
        $recipes = Recipe::latest()->paginate(12);
        return view('recipes.index', compact('recipes'));
    }
    public function create(){ return view('recipes.create'); }
    public function store(StoreRecipeRequest $req){
        $data = $req->validated();
        $data['user_id'] = $req->user()->id;
        $data['slug'] = Str::slug($data['title']);
        $recipe = Recipe::create($data);
        return redirect()->route('recipes.show',$recipe->slug);
    }
    public function show($slug){
        $recipe = Recipe::where('slug',$slug)->firstOrFail();
        return view('recipes.show', compact('recipe'));
    }
}
