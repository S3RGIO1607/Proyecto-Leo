<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\TiposProductos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    

    // LISTAR
    public function index() {
        $productos = Productos::with('tipo') // relación correcta
                              ->orderBy('nombre')
                              ->paginate(12);

        return view('Productos.index', compact('productos'));
    }

    // FORMULARIO CREAR
    public function create() {
        $types = TiposProductos::orderBy('nombre')->get();
        return view('Productos.create', compact('types'));
    }

    // GUARDAR
    public function store(Request $request) {
        $data = $request->validate([
            'nombre'               => 'required|string|max:200',
            'sku'                  => 'nullable|string|max:100|unique:productos,sku',
            'tipos_productos_id'   => 'required|exists:tipos_productos,id',
            'precio'               => 'required|numeric|min:0',
            'stock'                => 'required|integer|min:0',
            'descripcion'          => 'nullable|string',
        ]);

        Productos::create($data);

        return redirect()->route('Productos.index')
                         ->with('success','Producto creado.');
    }

    // MOSTRAR DETALLE
    public function show(Productos $producto) {
        $producto->load('tipo'); // relación correcta
        return view('Productos.show', compact('producto'));
    }

    // FORMULARIO EDITAR
    public function edit(Productos $producto) {
        $tipos = TiposProductos::orderBy('nombre')->get();
        return view('Productos.edit', compact('producto','tipos'));
    }

    // ACTUALIZAR
    public function update(Request $request, Productos $producto) {
        $data = $request->validate([
            'nombre'               => 'required|string|max:200',
            'sku'                  => 'nullable|string|max:100|unique:productos,sku,'.$producto->id,
            'tipos_productos_id'   => 'required|exists:tipos_productos,id',
            'precio'               => 'required|numeric|min:0',
            'stock'                => 'required|integer|min:0',
            'descripcion'          => 'nullable|string',
        ]);

        $producto->update($data);

        return redirect()->route('Productos.index')
                         ->with('success','Producto actualizado.');
    }

    // ELIMINAR
    public function destroy(Productos $producto) {
        $producto->delete();

        return redirect()->route('Productos.index')
                         ->with('success','Producto eliminado.');
    }
}
