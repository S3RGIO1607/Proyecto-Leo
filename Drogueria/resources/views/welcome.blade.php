<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Droguería</title>

    <!-- Tailwind (si ya usas Breeze funciona sin problema) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(135deg, #d6ecfcff, #e1f8e3ff);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4">

    <div class="bg-white/70 backdrop-blur-md shadow-xl rounded-2xl p-10 w-full max-w-md text-center border border-white">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="/logo.png" 
                alt="Logo Droguería"
                class="w-40 h-40 object-contain drop-shadow-lg">
        </div>

        <!-- Título -->
        <h1 class="text-3xl font-bold text-gray-700 mb-3 tracking-wide">
            Droguería Santa Salud
        </h1>

        <!-- Subtítulo -->
        <p class="text-gray-600 mb-8">
            Sistema de Gestion de Productos y Tipos de Productos.
        </p>

        <!-- Botón Moderno -->
        <a href="{{ route('login') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow-md transition-all duration-200 w-full block">
           Iniciar Sesion
        </a>

    </div>

</body>
</html>
