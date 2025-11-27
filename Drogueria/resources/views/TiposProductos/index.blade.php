@extends('layouts.app')

@section('title','Tipos de productos')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Tipos de Productos</h2>

    <a href="{{ route('TiposProductos.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 duration-200 shadow">
        Nuevo Tipo
    </a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 rounded-lg shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-3 py-2 text-left">Nombre</th>
                <th class="border border-gray-300 px-3 py-2 text-left">Descripción</th>
                <th class="border border-gray-300 px-3 py-2 text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($types as $t)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-3 py-2">{{ $t->nombre }}</td>

                    <td class="border border-gray-300 px-3 py-2">
                        {{ Str::limit($t->descripcion, 50) }}
                    </td>

                    <td class="border border-gray-300 px-3 py-2 text-center space-x-2">

                        <!-- Editar -->
                        <a href="{{ route('TiposProductos.edit', $t) }}"
                           class="text-yellow-600 hover:underline">
                            Editar
                        </a>

                        <!-- Eliminar -->
                        <form action="{{ route('TiposProductos.destroy', $t) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button
                                onclick="return confirm('¿Eliminar este tipo?')"
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
    {{ $types->links() }}
</div>

@endsection


