<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(16);

        return view('product.view', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagesPath = [];
        if ($request->file('photos')) {
            foreach ($request->file('photos') as $image) {
                $path = $image->store('product/img');
                $imagesPath[] = $path;
            }
            if ($request->main_image) {
                $firstImage = $imagesPath[0];
                $imagesPath[0] = $imagesPath[$request->main_image];
                $imagesPath[$request->main_image] = $firstImage;
            }
        }

        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'html' => $request->html,
            'photos' => json_encode($imagesPath),
            'category' => $request->category
        ]);
        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'photos' => 'required|json'
        ]);
        $imagesPath = json_decode($request->photos);
        if ($request->main_image) {
            $firstImage = $imagesPath[0];
            $imagesPath[0] = $imagesPath[$request->main_image];
            $imagesPath[$request->main_image] = $firstImage;
        }
        foreach ($imagesPath as $i => $image) {
            // Storage::move("", "");
        }
        $product->update([
            'title' => $request->title,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'html' => $request->html,
            'photos' => json_encode($imagesPath),
            'category' => $request->category
        ]);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products');
    }
}
