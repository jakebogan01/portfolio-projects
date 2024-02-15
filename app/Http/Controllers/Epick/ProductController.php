<?php

namespace App\Http\Controllers\Epick;

use App\Models\Category;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        return Inertia::render('Projects/Epick/Products/Index', [
            'products' => Product::query()
                ->where('category_id', $category->id)
                ->where('project_id', 1)
                ->filter(request(['price', 'color']))
                ->latest()
                ->simplePaginate(6)
                ->withQueryString()
                ->through(fn($product) => [
                    'id' => $product->id,
                    'title' => $product->title,
                    'slug' => $product->slug,
                    'price' => $product->price,
                    'image' => $product->image,
                    'project' => $product->project->name,
                    'category' => $product->category->name,
                    'color' => $product->color,
                    'size' => $product->size,
                ]),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'searchResults' => $this->getSearchResults()['searchResults'],
            'filters' => request()->only(['price', 'color']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        if ($product->project_id !== 1) {
            abort(404);
        }
        return Inertia::render('Projects/Epick/Products/Show', [
            'product' => [
                'title' => $product->title,
                'price' => $product->price,
                'image' => $product->image,
                'images' => $product->images,
                'category' => $product->category->name,
            ],
            'searchResults' => $this->getSearchResults()['searchResults'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
