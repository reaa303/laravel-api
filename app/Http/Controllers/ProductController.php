<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller {
    public function index(){ return Product::all(); }
    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required|string',
            'price'=>'required|numeric',
            'description'=>'nullable|string'
        ]);
        $product = Product::create($data);
        return response()->json($product, 201);
    }
}
