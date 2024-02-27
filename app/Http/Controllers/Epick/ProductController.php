<?php

namespace App\Http\Controllers\Epick;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category, Request $request)
    {
        return Inertia::render('Projects/Epick/Products/Index', [
            'products' => Product::query()
                ->where('category_id', $category->id)
                ->where('project_id', config('enums.projects')['epick'])
                ->filter(request(['price', 'color', 'size', 'gender', 'age', 'style', 'brand', 'shape', 'rating']))
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
                    'gender' => $product->gender,
                    'age' => $product->age,
                    'style' => $product->style,
                    'brand' => $product->brand,
                    'shape' => $product->shape,
                    'rating' => $product->rating,
                ]),
            'canLogin' => Route::has('epick.login'),
            'canRegister' => Route::has('epick.register'),
            'searchResults' => $this->getSearchResults()['searchResults'],
            'filters' => request()->only(['price', 'color', 'size', 'gender', 'age', 'style', 'brand', 'shape', 'rating']),
            'cartQuantity' => $this->getCartQuantity($request)['cartQuantity'],
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
        if (!auth()->user()) {
            return redirect()->route('epick.login');
        }

        if (!Product::find($request->product['id'])) {
            return redirect()->route('epick.home')->with('error', 'Item not found!');
        }

        if (auth()->user()->cart) {
            if (auth()->user()->cart->products()->where('product_id', $request->product['id'])->exists()) {
                auth()->user()->cart->products()->updateExistingPivot($request->product['id'], [
                    'quantity' => auth()->user()->cart->products()->where('product_id', $request->product['id'])->first()->pivot->quantity + 1
                ]);
            } else {
                auth()->user()->cart->products()->attach($request->product['id'], ['quantity' => 1]);
            }
            auth()->user()->cart()->update([
                'quantity' => auth()->user()->cart->products()->where('product_id', $request->product['id'])->first()->pivot->quantity,
                'total_price' => auth()->user()->cart->total_price + (float) $request->product['price'],
            ]);
        } else {
            auth()->user()->cart()->create([
                'user_id' => auth()->user()->id,
                'quantity' => 1,
                'total_price' => (float) $request->product['price'],
            ])->products()->attach($request->product['id'], ['quantity' => 1]);
        }

        return redirect()->back()->with('success', 'Saved to cart!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, Request $request)
    {
        if ($product->project_id !== config('enums.projects')['epick']) {
            redirect()->route('epick.home');
        }
        return Inertia::render('Projects/Epick/Products/Show', [
            'product' => [
                'id' => $product->id,
                'title' => $product->title,
                'description' => $product->description,
                'color' => $product->color,
                'price' => $product->price,
                'image' => $product->image,
                'images' => $product->images,
                'category' => $product->category->name,
            ],
            'searchResults' => $this->getSearchResults()['searchResults'],
            'canLogin' => Route::has('epick.login'),
            'canRegister' => Route::has('epick.register'),
            'cartQuantity' => $this->getCartQuantity($request)['cartQuantity'],
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
    public function destroy(Product $product)
    {
        if (!auth()->user()->cart->products()->where('product_id', $product->id)->exists()) {
            return redirect()->route('epick.home')->with('error', 'Item not found in cart!');
        }

        $productPrice = (float) $product->price;

        auth()->user()->cart()->update([
            'quantity' => auth()->user()->cart->quantity - auth()->user()->cart->products()->where('product_id', $product->id)->first()->pivot->quantity,
            'total_price' => auth()->user()->cart->total_price - (float) $product->price,
        ]);
        auth()->user()->cart->products()->detach($product->id);

        if (!auth()->user()->cart->products()->where('product_id', $product->id)->exists()) {
            $cartQuantity = auth()->user()->cart->quantity;
            $cartTotalPrice = $cartQuantity * $productPrice;
            auth()->user()->cart()->update([
                'total_price' => auth()->user()->cart->total_price - $cartTotalPrice,
            ]);
        }

        return redirect()->route('epick.checkout')->with('success', 'Item removed from cart!');
    }
}
