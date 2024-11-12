<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function CreateProduct(Request $request)
    {
        try {
            $productValidation = Validator::make($request->all(), [
                'product_name'        => 'required|max:255',
                'product_description' => 'nullable',
                'category'            => 'required',
                'owner_id'            => 'required|exists:users,id',
                'product_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($productValidation->fails()) return response(['status' => 'warning', 'message' => $productValidation->errors()->first()]);

            $productImagePath = $request->file('product_image');
            $productImagePath = $productImagePath->store();
            $request->product_image->move(public_path('products_images'), $productImagePath);

            $product = Product::create([
                'product_name'        => trim($request->product_name),
                'product_description' => trim($request->product_description),
                'category_id'         => $request->category,
                'product_image'       => $productImagePath,
                'product_price'       => trim($request->product_price),
                'owner_id'            => $request->owner_id
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => $request->product_name,
                'product' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'An unexpected error occurred while creating the product. Please try again later.'
            ]);
        }
    }

    public function DeleteProduct(Request $request) {}
}
