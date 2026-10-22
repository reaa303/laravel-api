<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// UI routes - para sa box site mo
Route::view('/ui', 'products.index');
Route::view('/ui/create', 'products.create');

// Ito yung kulang kaya nag-eerror - ADD MO TO!
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', function() {
    return redirect('/ui/create');
});
