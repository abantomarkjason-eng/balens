<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display Products Table (based on logged-in user)
    public function productsTable()
    {
        $userId = session('user_id');
        $products = Product::where('user_id', $userId)->get();
        
        return view('products', compact('products'));
    }

    // Add Product (use this one, remove store())
    public function addProduct(Request $request)
    {
        $userId = session('user_id');
        
        if (!$userId) {
            return redirect()->back()->with('error', 'Please login first');
        }

        $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'user_id' => $userId,  // This is required!
            'image' => $imagePath,
        ]);

        return back()->with('success', 'Product added successfully');
    }

    // Update Product
    public function updateProduct(Request $request, $id)
    {
        $userId = session('user_id');
        
        $product = Product::where('id', $id)->where('user_id', $userId)->first();
        
        if(!$product){
            return back()->with('error', 'Product not found');
        }

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imagePath,
        ]);

        return back()->with('success', 'Product updated successfully');
    }

    // Delete Product
    public function deleteProduct($id)
    {
        $userId = session('user_id');
        
        $product = Product::where('id', $id)->where('user_id', $userId)->first();
        
        if(!$product){
            return back()->with('error', 'Product not found or access denied');
        }
        
        $product->delete();
        
        return back()->with('success', 'Product deleted successfully');
    }
} 
