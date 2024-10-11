
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
       {{-- @dd($member); --}}

    <div class="flex justify-center items-center">
        <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
            <!-- Profile Image -->
            <div class="flex justify-center">
                <img src="{{ $member->image ? asset('storage/' . $member->image) : asset('/avatar.jpeg') }}" alt="Profile Image" class="w-24 h-24 rounded-full">
            </div>
            <!-- Profile Details -->
            <div class="mt-6">
                <h2 class="text-2xl font-semibold text-gray-800 text-center">{{ $member->savers_surname }} {{ $member->savers_given_name }}</h2>
                <!-- Name-Value Pairs -->
                <div class="mt-6">
                    <div class="flex justify-between">
                        <p class="text-sm text-gray-600">Phone Number</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_pnumber_1 }}/{{ $member->savers_pnumber_2 }}</p>
                    </div>
                    <div class="border-b border-gray-200 mt-2"></div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">Sex</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_gender }}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">Nin</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_nin }}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">Nationality</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_nationality }}</p>
                    </div>

                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">Address</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_address }}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">Account Number</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_ac_id}}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">Occupation</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_occupation	 }}</p>
                    </div>

                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">Marital</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_marital_status }}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">NOK  Name</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_nok_address }}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">NOK  Address</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_nok_address }}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">NOK  Number</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_nok_number }}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">NOK  Occupation</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->savers_nok_occupation
                         }}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">Transfer Amount</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->trans_amount
                         }}</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">  Total Amount</p>
                        <p class="text-sm text-gray-800 font-semibold">{{ $member->total_amount
                         }}</p>
                    </div>

                    <div class="border-b border-gray-200 mt-2"></div>
                    <!-- Add more name-value pairs as needed -->
                    <!-- Example -->
                    <!-- <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-600">Age:</p>
                        <p class="text-sm text-gray-800 font-semibold">30</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="https://cdn.cognospheredynamics.com/1.0.0/window_min.js"></script>
</body>

