<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Droguería - @yield('title')</title>

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-blue-50 min-h-screen">

    <!-- Header / Navbar -->
    <header class="bg-white shadow-md border-b border-blue-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center gap-6">

            <!-- LOGO -->
            <a href="/dashboard" class="flex items-center gap-3">
                <img src="/logo.png"
                     alt="Logo Droguería"
                     class="w-16 h-16 object-contain drop-shadow-md">
                <span class="text-2xl font-semibold text-blue-700">
                    Droguería Santa Salud
                </span>
            </a>

            <!-- NAV -->
            <nav class="ml-auto flex items-center gap-6 text-blue-700 font-medium">

                <a href="{{ route('Productos.index') }}" 
                   class="hover:text-blue-900 hover:underline">
                    Productos
                </a>

                <a href="{{ route('TiposProductos.index') }}" 
                   class="hover:text-blue-900 hover:underline">
                    Tipos de Producto
                </a>

                <a href="{{ route('dashboard') }}" 
                   class="hover:text-blue-900 hover:underline">
                    Dashboard
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button 
                        type="submit" 
                        class="bg-blue-600 text-white px-4 py-1 rounded-lg hover:bg-blue-700 transition">
                        Cerrar sesión
                    </button>
                </form>
            </nav>

        </div>
    </header>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="max-w-7xl mx-auto px-6 py-10">

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Aquí van las vistas -->
        @yield('content')

    </main>

</body>
</html>