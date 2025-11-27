@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-6">Detalle del Producto</h2>

    <div class="space-y-3">
        <p><span class="font-semibold">Nombre:</span> {{ $producto->nombre }}</p>
        <p><span class="font-semibold">SKU:</span> {{ $producto->sku ?? '-' }}</p>
        <p><span class="font-semibold">Tipo:</span> {{ $producto->tipo->nombre ?? '-' }}</p>
        <p><span class="font-semibold">Precio:</span> ${{ number_format($producto->precio, 2) }}</p>
        <p><span class="font-semibold">Stock:</span> {{ $producto->stock }}</p>
        <p><span class="font-semibold">Descripción:</span> {{ $producto->descripcion ?? 'Sin descripción' }}</p>
    </div>

    <!-- Botones -->
    <div class="flex justify-end space-x-3 mt-6">

        <a href="{{ route('Productos.index') }}"
           class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
            Volver
        </a>

        <a href="{{ route('Productos.edit', $producto) }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 duration-200">
            Editar
        </a>

        <form action="{{ route('Productos.destroy', $producto) }}" method="POST" class="inline">
            @csrf @method('DELETE')
            <button type="submit"
                    onclick="return confirm('¿Eliminar este producto?')"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 duration-200">
                Eliminar
            </button>
        </form>

    </div>
</div>
@endsection
