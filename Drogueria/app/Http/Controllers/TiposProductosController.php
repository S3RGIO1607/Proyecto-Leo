<?php

namespace App\Http\Controllers;

use App\Models\TiposProductos;
use Illuminate\Http\Request;

class TiposProductosController extends Controller
{
    public function index() {
        $types = TiposProductos::orderBy('nombre')->paginate(10);
        return view('TiposProductos.index', compact('types'));
    }
    public function create() {
        return view('TiposProductos.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string|max:150|unique:tipos_productos,nombre',
            'descripcion' => 'nullable|string',
        ]);
        TiposProductos::create($data);
        return redirect()
            ->route('TiposProductos.index')
            ->with('success','Tipo creado.');
    }
    public function show(TiposProductos $tiposProducto) {
        return view('TiposProductos.show', ['tipo' => $tiposProducto]);
    }
    public function edit(TiposProductos $tiposProducto) {
        return view('TiposProductos.edit', ['tipo' => $tiposProducto]);
    }
    public function update(Request $request, TiposProductos $tiposProducto) {
        $data = $request->validate([
            'nombre' => 'required|string|max:150|unique:tipos_productos,nombre,' . $tiposProducto->id,
            'descripcion' => 'nullable|string',
        ]);
        $tiposProducto->update($data);
        return redirect()
            ->route('TiposProductos.index')
            ->with('success','Tipo actualizado.');
    }
    public function destroy(TiposProductos $tiposProducto) {
        $tiposProducto->delete();
        return redirect()
            ->route('TiposProductos.index')
            ->with('success','Tipo eliminado.');
    }
}
