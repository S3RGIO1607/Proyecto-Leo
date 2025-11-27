<x-guest-layout>

    <style>
        body {
            background: linear-gradient(135deg, #d6ecfcff, #def7e0ff);
        }
    </style>

    <div>

        <div class="bg-white/70 backdrop-blur-lg shadow-xl rounded-2xl p-10 w-full max-w-md border border-white">

            <!-- Título -->
            <h2 class="text-3xl font-bold text-gray-700 text-center mb-6">
                Iniciar Sesion
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700 font-semibold" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 font-semibold" />

                    <x-text-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        type="password" name="password" required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-700">Recordarme</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between mt-6">

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-800 transition"
                           href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                        Ingresar
                    </button>

                </div>

            </form>

        </div>
    </div>

</x-guest-layout>
