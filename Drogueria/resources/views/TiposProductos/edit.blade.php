@extends('layouts.app')

@section('title','Editar Tipo de Producto')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
    
    <h2 class="text-2xl font-bold mb-6">Editar Tipo de Producto</h2>

    <form action="{{ route('TiposProductos.update', $tipo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div>
            <label class="block font-semibold mb-1">Nombre</label>
            <input type="text" name="nombre"
                   value="{{ old('nombre', $tipo->nombre) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 
                          focus:border-blue-500 focus:ring-blue-500">
            @error('nombre')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Descripción -->
        <div>
            <label class="block font-semibold mb-1">Descripción</label>
            <textarea name="descripcion"
                      rows="3"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 
                             focus:border-blue-500 focus:ring-blue-500">{{ old('descripcion', $tipo->descripcion) }}</textarea>

            @error('descripcion')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botones -->
        <div class="flex justify-end space-x-3 mt-4">

            <a href="{{ route('TiposProductos.index') }}"
               class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                Cancelar
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow 
                           hover:bg-blue-700 duration-200">
                Guardar Cambios
            </button>

        </div>

    </form>
</div>
@endsection
