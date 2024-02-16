<?php

namespace App\Http\Controllers\Epick;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Projects/Epick/Home/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'searchResults' => $this->getSearchResults()['searchResults'],
            'categories' => Category::where('project_id', 1)->get(),
            'cartQuantity' => $request->user()
                ?
                $request->user()->cart->products->count() > 0
                    ?
                    [
                        'quantity' => $request->user()->cart->quantity,
                        'products' => $request->user()->cart->products->map(function ($product) {
                            return [
                                'id' => $product->id,
                                'name' => $product->name,
                                'price' => $product->price,
                                'image' => $product->image,
                            ];
                        }),
                    ]
                    :
                    [
                        'quantity' => 0,
                        'products' => [],
                    ]
                :
                null,
        ]);
    }
}
