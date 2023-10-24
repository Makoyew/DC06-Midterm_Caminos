<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(10);
        return Inertia::render('Products/Index', [
            'products' => $products,
            'csrf' => csrf_token(),
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('Products.Index')->with('message', 'Product deleted successfully.');
    }

    public function create() {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'brand'         => 'required|string',
            'name'          => 'required|string',
            'description'   => 'required|string',
            'thumbnail'     => 'image|required',
        ]);

        $product = new Product;

        $product->brand         = $request->input('brand');
        $product->name          = $request->input('name');
        $product->description   = $request->input('description');

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $product->thumbnail = $path;
        }
        $product->save();

        return redirect()->route('product.Index');
    }
}
