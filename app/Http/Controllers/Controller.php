<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
                ->where('project_id', 1)
                ->get()
                ->map->only('id', 'title', 'slug', 'price', 'image')
                : [],
            'searchFilters' => request()->only(['search']),
        ];
    }
}
