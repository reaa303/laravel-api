<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index(Request $request){
        $limit = $request->query('limit', 10);
        $products = Product::paginate($limit);
        
        // Kapag galing sa browser /ui, ipakita list
        if (!$request->expectsJson()) {
            return view('products.index', ['products' => $products]);
        }
        return $products;
    }

    public function store(Request $request){
        // Tanggapin BOTH product at assessment names
        $data = $request->validate([
            'student_name' => 'sometimes|required|string|min:3',
            'name' => 'sometimes|required|string|min:3',
            'subject' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0|max:100',
            'grade' => 'sometimes|required|numeric|min:0|max:100',
            'remarks' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string|max:255',
        ]);

        // I-map yung assessment form to products table
        $productData = [
            'name' => $data['student_name'] ?? $data['name'],
            'price' => $data['grade'] ?? $data['price'],
            'description' => ($data['subject'] ?? '') . ' - ' . ($data['remarks'] ?? $data['description'] ?? ''),
        ];

        $product = Product::create($productData);

        // Kung API request, JSON. Kung website form, redirect
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json($product, 201);
        }

        return redirect('/ui')->with('success', 'Grade added: ' . $productData['name'] . ' - ' . $productData['price']);
    }
}
