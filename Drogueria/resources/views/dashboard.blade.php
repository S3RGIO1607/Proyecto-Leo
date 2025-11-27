@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="text-center mb-10">
    <h2 class="text-3xl font-semibold text-blue-700">Bienvenido al Sistema</h2>
    <p class="text-gray-600 mt-2">Gestión de productos y tipos de producto para tu drogueria.</p>
</div>

<!-- Tarjetas -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

    <a href="{{ route('Productos.index') }}"
       class="bg-white shadow-md p-6 rounded-xl border border-blue-100 hover:shadow-lg">
        <h3 class="text-xl font-semibold text-blue-700 mb-2">Productos</h3>
        <p class="text-gray-600">Administra los productos disponibles en la droguería.</p>
    </a>

    <a href="{{ route('TiposProductos.index') }}"
       class="bg-white shadow-md p-6 rounded-xl border border-blue-100 hover:shadow-lg">
        <h3 class="text-xl font-semibold text-blue-700 mb-2">Tipos de Producto</h3>
        <p class="text-gray-600">Gestiona las categorías o tipos de los productos.</p>
    </a>

    <div class="bg-white text-blue-600 shadow-md p-6 rounded-xl">
        <h3 class="text-xl font-semibold mb-2">Usuario</h3>
        <p class="opacity-90">Sesión iniciada por: <strong>{{ Auth::user()->name }}</strong></p>
    </div>

</div>

@endsection
