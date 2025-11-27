@extends('layouts.app')

@section('title','Crear Producto')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-6">Crear Producto</h2>

    <form action="{{ route('Productos.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Nombre -->
        <div>
            <label class="block font-semibold mb-1">Nombre</label>
            <input type="text" name="nombre"
                   value="{{ old('nombre') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            @error('nombre')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- SKU -->
        <div>
            <label class="block font-semibold mb-1">SKU</label>
            <input type="text" name="sku"
                   value="{{ old('sku') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            @error('sku')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tipo de producto -->
        <div>
            <label class="block font-semibold mb-1">Tipo</label>
            <select name="tipos_productos_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:border-blue-500 focus:ring-blue-500">
                <option value="">-- Elegir --</option>
                @foreach($types as $t)
                    <option value="{{ $t->id }}"
                        {{ old('tipos_productos_id') == $t->id ? 'selected' : '' }}>
                        {{ $t->nombre }}
                    </option>
                @endforeach
            </select>
            @error('tipos_productos_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Precio -->
        <div>
            <label class="block font-semibold mb-1">Precio</label>
            <input type="number" name="precio"
                   value="{{ old('precio', 0) }}"
                   step="0.01"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            @error('precio')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stock -->
        <div>
            <label class="block font-semibold mb-1">Stock</label>
            <input type="number" name="stock"
                   value="{{ old('stock', 0) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            @error('stock')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Descripción -->
        <div>
            <label class="block font-semibold mb-1">Descripción</label>
            <textarea name="descripcion"
                      rows="3"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-blue-500 focus:ring-blue-500">{{ old('descripcion') }}</textarea>
        </div>

        <!-- Botones -->
        <div class="flex justify-end space-x-3 mt-4">

            <a href="{{ route('Productos.index') }}"
               class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                Cancelar
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 duration-200">
                Guardar
            </button>
        </div>

    </form>
</div>
@endsection
