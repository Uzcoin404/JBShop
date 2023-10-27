<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
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
        $request->validate([
            'name' => 'required|max:255',
        ]);
        if (!$request->subcategory) {
            $category = Category::where('name', $request->name)->first();
            if ($category) {
                return response()->json(['status' => false, 'error' => 'Category already exist']);
            }
            Category::create($request->all());
            return response()->json([
                'status' => true, 'data' => ['name' => $request->name, 'category' => null]
            ]);
        } else {
            $category = Category::where('name', $request->subcategory)->firstOrFail();
            if ($category['subcategory']) {
                $subcategories = json_decode($category['subcategory']);
            } else {
                $subcategories = [];
            }
            $subcategories[] = $request->name;
            $category->update([
                'subcategory' => json_encode($subcategories)
            ]);
            return response()->json([
                'status' => true, 'data' => ['name' => $request->name, 'category' => $request->subcategory]
            ]);
        }
        return response('', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        if (!isset($request->subcategory)) {
            $category->delete();
        } else {
            $subcategories = json_decode($category['subcategory']);
            $newSubcategories = [];
            foreach ($subcategories as $subcategory) {
                if ($subcategory != $request->subcategory) {
                    $newSubcategories[] = $subcategory;
                }
            }
            $category->update([
                'subcategory' => json_encode($newSubcategories)
            ]);
        }
        return redirect('categories');
    }
}
