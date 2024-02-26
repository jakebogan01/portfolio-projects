<?php

namespace App\Http\Controllers\Epick;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Projects/Epick/Checkout/Index', [
            'canLogin' => Route::has('epick.login'),
            'canRegister' => Route::has('epick.register'),
            'searchResults' => $this->getSearchResults()['searchResults'],
            'cartQuantity' => $this->getCartQuantity($request)['cartQuantity'],
        ]);
    }
}
