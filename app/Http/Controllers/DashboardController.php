<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\SellTransaction;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $category = ProductCategory::all();
        $productBaseOnCategory = [];
        foreach ($category as $key => $value) {
            $productBaseOnCategory = Product::where('category_id', $value->id)->count();
        }
        
        $transaction = [];
        for ($i = 1; $i <= \Carbon\Carbon::now()->daysInMonth; $i++) {
        };
        // $transaction = SellTransaction::get();
        return view('pages.dashboard', compact('productBaseOnCategory'));
    }
}
