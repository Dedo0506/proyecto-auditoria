<x-guest-layout>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <div x-data="{
        show: false,
        email: '',
        password: '',
        toggle: '0',
    }" class="max-w-md px-3 rounded-lg mx-auto overflow-hidden mt-4 bg-white">
        <x-authentication-card class="max-w-md ">
            <img src="img/Google_2015_logo.svg.png" alt="Google_logo" style="width: 70px; display: block; margin: 0 auto;">
            <br>
            <h1 class="text-2xl text-center text-bold">Inicia sesión</h1>
            <p class="text-sm text-gray text-center mt-2">Utiliza tu cuenta de Google</p><br><br>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label class="text-sm text-gray-400 mt-2">Correo electrónico o télefono</label>
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" placeholder="Correo electrónico o télefono" />
                </div><br>

                <div class="relative items-center">
                    <label class="text-sm text-gray-400 mt-2">Password</label>
                    <input :type="show ? 'text' : 'password'" x-model="password" name="password"
                        class=" block mt-1 w-full h-12 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-lg">

                    <button @click="show = !show" class="absolute inline-block bottom-0 right-0 m-3">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <a href="{{ route('register') }}"
                        class="ml-4 text-blue-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Crear una cuenta </a>
                    <x-button style="background: royalblue" class="ms-4">
                        {{ __('Log in') }}
                    </x-button>

                </div>
            </form>
        </x-authentication-card>
</x-guest-layout>
