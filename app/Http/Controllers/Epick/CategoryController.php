<?php

namespace App\Http\Controllers\Epick;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Projects/Epick/Category/Index', [
            'canLogin' => Route::has('epick.login'),
            'canRegister' => Route::has('epick.register'),
            'searchResults' => $this->getSearchResults()['searchResults'],
            'categories' => Category::where('project_id', config('enums.projects')['epick'])->get(),
            'cartQuantity' => $this->getCartQuantity($request)['cartQuantity'],
        ]);
    }
}
