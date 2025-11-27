@extends('layouts.app')

@section('title','Productos')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Productos</h2>

    <a href="{{ route('Productos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 duration-200 shadow">
        Nuevo Producto
    </a>
</div>
    
<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 rounded-lg shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-3 py-2 text-left">Nombre</th>
                <th class="border border-gray-300 px-3 py-2 text-left">Tipo</th>
                <th class="border border-gray-300 px-3 py-2 text-left">Precio</th>
                <th class="border border-gray-300 px-3 py-2 text-left">Stock</th>
                <th class="border border-gray-300 px-3 py-2 text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($productos as $p)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-3 py-2">{{ $p->nombre }}</td>

                    <td class="border border-gray-300 px-3 py-2">
                        {{ $p->tipo->nombre ?? '-' }}
                    </td>

                    <td class="border border-gray-300 px-3 py-2">${{ number_format($p->precio,2) }}</td>
                    <td class="border border-gray-300 px-3 py-2">{{ $p->stock }}</td>

                    <td class="border border-gray-300 px-3 py-2 text-center space-x-2">

                        <!-- Ver -->
                        <a href="{{ route('Productos.show', $p) }}"
                           class="text-blue-600 hover:underline">Ver</a>

                        <!-- Editar -->
                        <a href="{{ route('Productos.edit', $p) }}"
                           class="text-yellow-600 hover:underline">Editar</a>

                        <!-- Eliminar -->
                        <form action="{{ route('Productos.destroy', $p) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button
                                onclick="return confirm('¿Eliminar este producto?')"
                                class="text-red-600 hover:underline">
                                Eliminar
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Paginación -->
<div class="mt-4">
    {{ $productos->links() }}
</div>
@endsection

