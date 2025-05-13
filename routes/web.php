<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('Loginpage');
});
Route::get('/sale', function () {
    $categories = Category::all(); // Adjust logic to your DB
    // $brands = Product::distinct()->pluck('brand'); // Adjust logic to your DB
    return view('SalesPage',compact('categories'));
});
Route::get('/admin', function () {
    $categories = Category::all(); // Adjust logic to your DB

    return view('AdminPage', compact('categories'));
});

Route::get('/brands/{category}', function ($category){
    $brands = Product::where('category', $category)->get(); // Adjust logic to your DB
    return response()->json($brands);
}
)->name('get.brands.by.category');

Route::get('/specs/{brand}', function ($brand){
    $specs = Product::where('model', $brand)->get(); // Adjust logic to your DB
    return response()->json($specs);
}

)->name('get.specs.by.brand');


Route::get('/category/create', function () {
    return view('category.create');
})->name('category.create');

Route::post('/category/store', function (Request $request) {

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);
    $category = new \App\Models\Category();
    $category->name = $request->input('name');
    // $category->description = $request->input('description');
    $category->save();
    return response()->json(['message' => 'Category created successfully']);
})->name('category.store');