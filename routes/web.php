<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::orderBy('id')->cursorPaginate(15);
    $categories = Category::all();
    return view('home', ['products' => $products, 'categories' => $categories]);
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/products', ProductController::class)->names([
        'index' => 'products.index',
        'create' => 'products.create',
        'edit' => 'products.edit'
    ])->except('show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/categories', [CategoryController::class, 'index']);
});
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('category/{category}/{subcategory?}', function ($category, $subcategory = null) {
    if (!$subcategory) {
        $products = Product::where('category', $category)->cursorPaginate(16);
    } else {
        $products = Product::whereJsonContains('category', $subcategory)->cursorPaginate(16);
    }
    if ($products->isEmpty()) {
        $products = null;
    }
    $categories = Category::all();
    
    return view('category', [
        'products' => $products,
        'categories' => $categories,
        'category' => $category,
        'subcategory' => $subcategory
    ]);
});


require __DIR__ . '/auth.php';
