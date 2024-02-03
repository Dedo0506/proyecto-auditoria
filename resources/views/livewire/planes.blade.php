<!-- component -->
<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    {{-- Componente con Alpine.js --}}
    <div x-data="{
        tipoPago: 'Mes',
        basico: '34',
        estandar: '49',
        premium: '169'
    }" class="min-h-full my-10">

        {{-- Seccion del encabezado --}}
        <div class="w-full pb-24 text-center">
            <div>
                <x-nav-link>
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <div class="flex items-center justify-end space-x-4">
                                    <a href="{{ url('/dashboard') }}"
                                        class="bg-blue-600 hover:bg-blue-700 px-8 py-2 text-sm text-gray-200 rounded font-bold transition duration-150">Cambiar
                                        a plan superior</a>

                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <x-responsive-nav-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </div>
                            @else
                                <a href="{{ route('login') }}"
                                    class="bg-blue-600 hover:bg-blue-700 px-8 py-2 text-sm text-gray-200 rounded font-bold transition duration-150">Log
                                    in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </x-nav-link>
            </div>

            <div>
                <img src="img/Google_One_logo.svg.png" alt="Google_One_logo"
                    style="width: 20px; display: block; margin: 0 auto;">
            </div>
            {{-- informacionde la pagina --}}
            <div>
                <h4 class="text-4xl text-black-100">Elige el plan que más te convenga</h4>
                <p class="text-sm text-black-100 mt-2">A partir de 100 GB. Todas las cuentas de Google incluyen 15 GB de
                    espacio de almacenamiento</p>
                <p class="text-sm text-black-100 mt-2">Al suscribirte a un plan de Google One, aceptas los Términos del
                    Servicio de Google One. </p>
                <p class="text-sm text-black-100 mt-2">Nota: La Política de Privacidad de Google describe cómo se tratan
                    los
                    datos en este servicio.</p>
            </div>
            <div class="flex items-center justify-center mt-8">
                <button
                    @click="
                    tipoPago = 'Mes',
                    basico= '34',
                    estandar= '49',
                    premium= '169'
                "
                    class="text-gray-800 px-4 py-2 rounded-tl-lg rounded-bl-lg bg-gray-200"
                    :class="tipoPago === 'Mes' ? 'bg-blue-300' : 'bg-gray-200'" title="Choose Monthly billing">
                    Mensual
                </button>
                <button
                    @click="
                    tipoPago = 'Año',
                    basico= '340',
                    estandar= '490',
                    premium= '1699'
                "
                    class="text-gray-800 px-4 py-2 rounded-tr-lg rounded-br-lg bg-gray-200"
                    :class="tipoPago === 'Año' ? 'bg-blue-300' : 'bg-gray-200'" title="Choose Annual billing">
                    Anual
                </button>
            </div>
        </div>

        {{-- Seccion de contenido principal --}}
        <div class="w-full 2xl:w-4/4 flex items-center justify-center px-8 md:px-32 lg:px-16 2xl:px-0 mx-auto -mt-8">

            <div class="w-full grid grid-cols-1 xl:grid-cols-4 gap-8">

                {{-- Detalles del Plan 15GB --}}
                <div class="bg-white shadow-2xl rounded-lg py-4">
                    <p class="text-2xl text-center"><br><br><br></p>
                    <p class="text-4xl text-center">15 GB</p>
                    <br><br><br><br><br><br><br>
                    <ul class="border-t border-gray-300 py-8 space-y-6">
                        <li class="flex items-center space-x-2 px-8">
                            <span class="text-gray-600 capitalize">Incluye</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="text-gray-600 capitalize">15 GB de almacenamiento</span>
                        </li>
                    </ul>
                </div>

                {{-- Detalles del Plan Básico --}}
                <div class="bg-white shadow-2xl rounded-lg py-4 border border-4 border-blue-800">
                    <p class="text-xs text-center font-bold">RECOMENDADO</p><br>
                    <p class="text-2xl text-center">BÁSICO</p>
                    <p class="text-4xl text-center font-bold">100 GB</p>
                    <p class="text-center py-8">
                        <span class="text-2xl text-center">
                            <span x-text="basico"></span> MXN
                        </span>
                        <span class="text-xs uppercase text-gray-500">
                            / <span x-text="tipoPago"></span>
                        </span>
                    </p>
                    <p class="text-center">
                        <span class="text-xs uppercase text-gray-500">
                            Pago <span x-text="tipoPago === 'Mes' ? 'mensual' : 'anual'">
                            </span>
                    </p>
                    <div class="flex items-center justify-center mt-6">
                        @auth
                            <a
                                class="bg-blue-600 hover:bg-blue-700 px-8 py-2 text-sm text-gray-200 uppercase rounded font-bold transition duration-150">
                                Obtener oferta
                            </a>
                        @else
                            <!-- Si el usuario no está autenticado, muestra el botón "Empezar" -->
                            <a href="dashboard"
                                class="bg-blue-600 hover:bg-blue-700 px-8 py-2 text-sm text-gray-200 uppercase rounded font-bold transition duration-150">
                                Empezar
                            </a>
                        @endauth
                    </div>
                    <br>
                    <ul class="border-t border-gray-300 py-8 space-y-6">
                        <li class="flex items-center space-x-2 px-8">
                            <span class="text-gray-600 capitalize">Google One incluye</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">100 GB de almacenamiento</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Ayuda de expertos de Google</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Comparte tu plan con hasta 5 personas más</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Más funciones de edición de Google fotos</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Ventajas para suscriptores</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">VPN para varios dispositivos</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Monitorizar la dark web</span>
                        </li>
                    </ul>
                </div>

                {{-- Detalles del Plan Estándar --}}
                <div class="bg-white shadow-2xl rounded-lg py-4">
                    <br><br>
                    <p class="text-2xl text-center">ESTÁNDAR</p>
                    <p class="text-4xl text-center font-bold">200 GB</p>
                    <p class="text-center py-8">
                        <span class="text-2xl text-center">
                            <span x-text="estandar"></span> MXN
                        </span>
                        <span class="text-xs uppercase text-gray-500">
                            / <span x-text="tipoPago"></span>
                        </span>
                    </p>
                    <p class="text-center">
                        <span class="text-xs uppercase text-gray-500">
                            Pago <span x-text="tipoPago === 'Mes' ? 'mensual' : 'anual'">
                            </span>
                    </p>
                    <div class="flex items-center justify-center mt-6">
                        @auth
                            <a
                                class="bg-blue-600 hover:bg-blue-700 px-8 py-2 text-sm text-gray-200 uppercase rounded font-bold transition duration-150">
                                Obtener oferta
                            </a>
                        @else
                            <!-- Si el usuario no está autenticado, muestra el botón "Empezar" -->
                            <a href="dashboard"
                                class="bg-blue-600 hover:bg-blue-700 px-8 py-2 text-sm text-gray-200 uppercase rounded font-bold transition duration-150">
                                Empezar
                            </a>
                        @endauth
                    </div>
                    <br>
                    <ul class="border-t border-gray-300 py-8 space-y-6">
                        <li class="flex items-center space-x-2 px-8">
                            <span class="text-gray-600 capitalize">Google One incluye</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">200 GB de almacenamiento</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Ayuda de expertos de Google</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Comparte tu plan con hasta 5 personas más</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Más funciones de edición de Google fotos</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Ventajas para suscriptores</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">VPN para varios dispositivos</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Monitorizar la dark web</span>
                        </li>
                    </ul>
                </div>

                {{-- Detalles del Plan Premium --}}
                <div class="bg-white shadow-2xl rounded-lg py-4">
                    <br><br>
                    <p class="text-2xl text-center">PREMIUM</p>
                    <p class="text-4xl text-center font-bold">2 TB</p>
                    <p class="text-center py-8">
                        <span class="text-2xl text-center">
                            <span x-text="premium"></span> MXN
                        </span>
                        <span class="text-xs uppercase text-gray-500">
                            / <span x-text="tipoPago"></span>
                        </span>
                    </p>
                    <p class="text-center">
                        <span class="text-xs uppercase text-gray-500">
                            Pago <span x-text="tipoPago === 'Mes' ? 'mensual' : 'anual'">
                            </span>
                    </p>
                    <div class="flex items-center justify-center mt-6">
                        @auth
                            <a
                                class="bg-blue-600 hover:bg-blue-700 px-8 py-2 text-sm text-gray-200 uppercase rounded font-bold transition duration-150">
                                Obtener oferta
                            </a>
                        @else
                            <!-- Si el usuario no está autenticado, muestra el botón "Empezar" -->
                            <a href="dashboard"
                                class="bg-blue-600 hover:bg-blue-700 px-8 py-2 text-sm text-gray-200 uppercase rounded font-bold transition duration-150">
                                Empezar
                            </a>
                        @endauth
                    </div>
                    <br>
                    <ul class="border-t border-gray-300 py-8 space-y-6">
                        <li class="flex items-center space-x-2 px-8">
                            <span class="text-gray-600 capitalize">Google One incluye</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">2 TB de almacenamiento</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Ayuda de expertos de Google</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Comparte tu plan con hasta 5 personas más</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Más funciones de edición de Google fotos</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Ventajas para suscriptores</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Funciones premium de Google Workspace</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">VPN para varios dispositivos</span>
                        </li>
                        <li class="flex items-center space-x-2 px-8">
                            <span class="bg-blue-600 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="text-gray-600 capitalize">Monitorizar la dark web</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
