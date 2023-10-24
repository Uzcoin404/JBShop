<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth')->group(function () {
    Route::post('upload', function (Request $request) {
        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagesPath = [];
        if ($request->file('photos')) {
            foreach ($request->file('photos') as $image) {
                $path = $image->store('temp/img');
                $imagesPath[] = $path;
            }
        }
    
        return response()->json($imagesPath, 201);
    });
// });
