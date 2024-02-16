<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get search results.
     *
     * @return array
     */
    public function getSearchResults()
    {
        return [
            'searchResults' => request('search')
                ?
                Product::where('title', 'like', '%'.request('search').'%')
                ->orWhereHas('category', function ($query) {
                    $query->where('name', 'like', '%'.request('search').'%');
                })
                ->where('project_id', config('enums.projects')['epick'])
                ->get()
                ->map->only('id', 'title', 'slug', 'price', 'image')
                : [],
            'searchFilters' => request()->only(['search']),
        ];
    }

    /**
     * Get search results.
     *
     * @return array
     */
    public function getCartQuantity(Request $request)
    {
        return [
            'cartQuantity' => $request->user()
                ?
                $request->user()->cart && $request->user()->cart->products->count() > 0
                    ?
                    [
                        'quantity' => $request->user()->cart->quantity,
                        'products' => $request->user()->cart->products->map(function ($product) {
                            return [
                                'id' => $product->id,
                                'title' => $product->title,
                                'slug' => $product->slug,
                                'price' => $product->price,
                                'image' => $product->image,
                                'quantity' => $product->pivot->quantity,
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
        ];
    }
}
