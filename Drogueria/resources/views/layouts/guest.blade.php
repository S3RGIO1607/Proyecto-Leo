<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Droguería') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                /* Fondo moderno azul → verde suave */
                background: linear-gradient(135deg, #e1f5fe, #e8f5e9);
                min-height: 100vh;
            }
        </style>
    </head>

    <body class="font-sans text-gray-900 antialiased">

        <div class="min-h-screen flex flex-col justify-center items-center p-6">

            <!-- LOGO -->
            <div class="mb-6">
                <a href="/">
                    <img src="/logo.png"
                         alt="Logo Droguería"
                         class="w-32 h-32 object-contain drop-shadow-2xl hover:scale-105 transition">
                </a>
            </div>

            <!-- TARJETA DEL LOGIN / REGISTER -->
            <div class="w-full sm:max-w-md bg-white/70 backdrop-blur-lg border border-white shadow-xl rounded-2xl px-8 py-10"> 
                
                {{ $slot }} 
            
            </div>
        </div>

    </body>
</html>
