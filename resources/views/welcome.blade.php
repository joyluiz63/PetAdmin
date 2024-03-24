<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>

<body class="bg-gray-100 gap-2">

    <main class="w-full min-h-screen flex flex-col md:flex-row items-center justify-center mx-auto">

        <section
            class="hidden md:flex gap-8 w-full flex-1 bg-amber-100 h-screen items-center justify-center flex-col p-4">
            <img src="{{ asset('img/pets.jpg') }}" alt="Logo do Usuario" class="hover:scale-110 duration-300" />

            <h1 class="font-bold text-center max-w-lg lg:text-lg">
                Tenha o controle dos cuidados necessários para manter o seu Pet saudável e feliz!
            </h1>
        </section>

        <section class="w-full bg-blue-100 flex-1 flex flex-col justify-center items-center p-4">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="w-full max-w-xl justify-center items-center flex flex-col gap-4">
                <img src="{{ asset('img/login.jpg') }}" alt="Logo do Usuario" class="w-36 hover:scale-110 duration-300" />

                <h1 class="text-2xl font-bold mb-7">Login</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label>Email</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label>Senha</label>

                    <input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">

                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Lembre-me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end my-4">
                    <button class="btn mx-4 bg-blue-600 text-white px-4 py-1 font-semibold">
                        Acessar
                     <button>
                        
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif

                </div>
                <p>
                    Não possui uma conta?
                    <a href="{{ route('register') }}" class="font-medium text-sky-800 hover:text-sky-600 duration-200">Criar conta</a>
                </p>
            </form>

        </section>

    </main>

</body>

</html>

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
