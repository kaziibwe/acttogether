<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - ACTogether Uganda</title>

    <link rel="icon" type="image/x-icon" href="/favicon_io/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- alpine --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        .color-blue {
            color: blue;
        }

        .display {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding-bottom: 2%;
        }

        .padding-left {
            /* padding-left: 5%; */
        }

        .div-member-btn {}
    </style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <section>
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <a href="/" class="flex ms-2 md:me-24">
                            <img src="/act.jpg" class="h-8 me-3" alt="ACTogether Logo" />
                            <span
                                class="self-center text-xl pl-2 ml-2 font-semibold sm:text-2xl whitespace-nowrap dark:text-white">"Okwegata!..."</span>
                        </a>
                    </div>
                    {{-- flash message --}}

                    <x-flash_message />

                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <div>
                                @auth


                                    <button type="button"
                                        class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-red-400 dark:focus:ring-red-500"
                                        aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ auth('')->user()->image ? asset('storage/' . auth()->user()->image) : asset('/avatar.jpeg') }}"
                                            alt="user photo">

                                        {{-- src="{{ $member->image ? asset('storage/' . $member->image) : asset('/avatar.jpeg') }}" --}}
                                </div>
                                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                    id="dropdown-user">
                                    <div class="px-4 py-3" role="none">
                                        <p class="text-sm text-gray-900 dark:text-white" role="none">
                                            {{ auth()->user()->role }} </p>
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                            role="none">
                                            {{ auth()->user()->name }} </p>
                                    </div>
                                    <ul class="py-1" role="none">
                                        <li>
                                            <a href="{{ route('adminProfilePage') }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-300 dark:text-gray-300 dark:hover:bg-red-500 dark:hover:text-white"
                                                role="menuitem">Profile</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logoutUser') }}">
                                                @csrf

                                                <input type="submit" value="Sign Out"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-300 dark:text-gray-300 dark:hover:bg-red-500 dark:hover:text-white">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Side Bar  -->
        <aside id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                    <li>
                        <!--Link for component 2-->
                        <a href="#" onclick="show_group_ui_component()"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-300 hover:text-white dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Groups</span>
                        </a>
                    </li>
                    <li>
                        <!--Link for component 3-->
                        <a href="#" onclick="show_individual_ui_component()"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-300 hover:text-white dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Individuals</span>
                        </a>
                    </li>
                </ul>

            </div>
        </aside>

        {{ $slot }}


        <script src="/main_script.js"></script>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.cognospheredynamics.com/1.0.0/window_min.js"></script>
</body>
