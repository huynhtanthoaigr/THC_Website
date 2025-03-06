<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('car')->get();
        return view('user.favorites.index', compact('favorites'));
    }

    public function store(Car $car)
    {
        Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
        ]);

        $count = Favorite::where('user_id', Auth::id())->count();

        return response()->json([
            'message' => 'Đã thêm vào danh sách yêu thích!',
            'count' => $count
        ]);
    }

    public function destroy(Car $car)
    {
        
        $favorite = Favorite::where('user_id', Auth::id())->where('car_id', $car->id)->first();
        
        if ($favorite) {
            $favorite->delete();
        }

        return back();
    }
}
