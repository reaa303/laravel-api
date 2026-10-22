<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller {
    public function index(Request $request){
        $limit = $request->query('limit', 10);
        return Product::paginate($limit);
    }
    public function store(Request $request){
        $data = $request->validate([
    'name'=>'required|string|min:3',
    'price'=>'required|numeric|min:0|max:100',
    'description'=>'nullable|string|max:255'
]);
        $product = Product::create($data);
        return response()->json($product, 201);
    }
}
