<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
class DashboardController extends Controller
{
    public function __invoke(){
        $user = Auth::user();
        $recipes = Recipe::where('user_id',$user->id)->latest()->take(5)->get();
        return view('dashboard', compact('user','recipes'));
    }
}
    // {
    //     $user = Auth::user();
    
    //     return view('dashboard', [
    //         'user' => $user,
    //         'countPublished' => Recipe::where('user_id',$user->id)->where('status','published')->count(),
    //         'countPending'   => Recipe::where('user_id',$user->id)->where('status','pending')->count(),
    //         'countDraft'     => Recipe::where('user_id',$user->id)->where('status','draft')->count(),
    //         'recipes'        => Recipe::where('user_id',$user->id)->latest()->paginate(12),
    //     ]);
    // }

