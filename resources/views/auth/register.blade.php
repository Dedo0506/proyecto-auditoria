<x-guest-layout>

    <div class="mx-60 my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
        
        <img src="img/Google_2015_logo.svg.png" alt="Google_logo" style="width: 70px; display: block; margin: 0 auto;">
        <h1 class="text-2xl text-center text-bold">Crea una cuenta de Google</h1>

        <form method="POST" action="{{ route('register') }}">
        <div class="my-5">
            @csrf

            <div class="flex items-center justify-center space-x-4">
                <label class="text-sm text-gray-400 mt-2">Nombre: </label>
                <x-input id="name" class="block mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                    placeholder="Nombre"/>
            </div>
        
            <div class="flex items-center justify-center space-x-4">
                <label class="text-sm text-gray-400 mt-2">Apellidos: </label>
                <x-input id="name" class="block mt-1" type="text" name="apellidos" :value="old('apellidos')" optional autofocus autocomplete="apellidos" 
                    placeholder="Apellidos (opcional)"/>
            </div>
            
            <div class="flex items-center justify-center space-x-4">
                <label class="text-sm text-gray-400 mt-2 text-center">Sexo: </label>
                <select  name="sexo" class="block mt-2 h-12 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-lg">
                    <option  value=""{{old('sexo')== '' ? 'selected' : ''}}>Seleccione</option>
                    <option value="M"{{old('sexo')== 'M' ? 'selected' : ''}}>Masculino</option>
                    <option value="F"{{old('sexo')== 'F' ? 'selected' : ''}}>Femenino</option>
                    <option value="F"{{old('sexo')== 'X' ? 'selected' : ''}}>Prefiero no decirlo</option>
                </select>
            </div>
            
            <div class="flex items-center justify-center space-x-4">
                <label class="text-sm text-gray-400 mt-2">Fecha Nacimiento:</label>
                <x-input id="fecNac" class="block mt-2" type="date" :value="old('fecNac')" required ></x-input>
            </div>

            <div class="flex items-center justify-center space-x-4">
                <label class="text-sm text-gray-400 mt-2 text-center block mt-1">{{ __('Email') }}: </label>
                <x-input id="email" class="block mt-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            
            <div class="flex items-center justify-center space-x-4">
                <label class="text-sm text-gray-400 mt-2">{{ __('Password') }}: </label>
                <x-input id="password" class="block mt-1 " type="password" name="password" required autocomplete="new-password" />
            </div>
            
            <div class="flex items-center justify-center space-x-4">
                <label class="text-sm text-gray-400 mt-2">{{ __('Confirm Password') }}: </label>
                <x-input id="password_confirmation" class="block mt-1 " type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="ml-4 text-blue-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" href="{{ route('login') }}">
                    {{ __('Iniciar sesión') }}
                </a>
                <x-button style="background: royalblue" class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </div>
        </form>
    </div>
</x-guest-layout>
