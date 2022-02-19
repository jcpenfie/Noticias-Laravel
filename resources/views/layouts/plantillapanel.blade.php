<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- favicon -->
    
    <!-- estilos -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{ route('login.usuario') }}" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">{{ucfirst($usuario->rol)}}</span>
            </a>
            <div class="flex items-center md:order-2">
                <button type="button"
                    class="flex mr-3 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Abrir el menú de usuario</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>

                <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ $usuario->nombre }}</span>
                        <span
                            class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ $usuario->rol }}</span>
                    </div>
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('login') }}"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-red-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Cerrar
                                Sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="justify-self-start">
            @yield('botones')
            </div>
        </div>
    </nav>
    <!-- nav -->

    @yield('content')

    <!-- footer -->

    <!-- script -->
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</body>
</html>