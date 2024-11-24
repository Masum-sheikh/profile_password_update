<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Index method to list products
    public function index()
    {
        $products = Product::with('category')->paginate(5); // Eager load category
        return view('products.index', compact('products'));
    }

    // Create method to show the form for creating a new product
    public function create()
    {
        $categories = Category::all(); // Get all categories
        return view('products.create', compact('categories'));
    }

    // Store method to save a product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image',
        ]);

        $input = $request->all();

        // Handle image upload if exists
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Product::create($input);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // Show method to view a product's details
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Edit method to show the form for editing a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Get all categories
        return view('products.edit', compact('product', 'categories'));
    }

    // Update method to save the edited product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Destroy method to delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}

