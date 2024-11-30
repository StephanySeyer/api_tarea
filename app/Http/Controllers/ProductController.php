<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Mostrar todos los productos
    public function index(){
        $products = Product::all();
        return response()->json($products);
    }

    // Actualizar un producto
    public function update(Request $request, $id){
        $product = Product::find($id);
        
        // Validar que el producto exista
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Actualizar el producto con los datos recibidos
        $product->update($request->all());
        return response()->json($product);
    }

    // Mostrar un producto específico
    public function show($id){
        $product = Product::find($id);
        
        // Validar que el producto exista
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($product);
    }

    // Eliminar un producto
    public function destroy($id){
        $product = Product::find($id);
        
        // Validar que el producto exista
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Producto eliminado']);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'name' => 'required|string|max:255', // 'name' es obligatorio y debe ser una cadena de caracteres
            'description' => 'required|string',  // 'description' es obligatorio y debe ser una cadena
            'price' => 'required|numeric|min:0', // 'price' es obligatorio y debe ser numérico y mayor o igual a 0
            'stock' => 'required|integer|min:0', // 'stock' es obligatorio y debe ser un entero y mayor o igual a 0
        ]);

        // Crear el producto
        $product = Product::create($validated);

        // Retornar la respuesta con el producto creado
        return response()->json($product, 201); // Código 201 para indicar que el producto fue creado correctamente
    }
}

