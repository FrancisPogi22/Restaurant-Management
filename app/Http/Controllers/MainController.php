<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function HomePage()
    {
        return view("UserPages.Homepage");
    }

    public function Products()
    {
        $products = Product::where('owner_id', Auth::user()->id)->with('category')->get();
        $categories = Categories::all();

        return view("UserPages.ProductPage", compact(["products", "categories"]));
    }
}
