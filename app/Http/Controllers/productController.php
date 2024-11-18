<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('product.list', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('product.create')->withInput()->withErrors($validator);
        }

        // Insert product into the database
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            // Store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Save image to product directory
            $image->move(public_path('uploads/products'), $imageName);

            // Save image name in the database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('product.index')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Return the edit view with product data
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // Find the product and update its details
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();

        // Redirect back to the products list with a success message
        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }
    public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
}


}

