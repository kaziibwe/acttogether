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
    <section>

        <div id="group_ui_component"
        class="p-4 m-4 border-2 border-red-200 border-dashed rounded-lg dark:border-gray-700 mt-14 h-[100vh]">

        <div class="display">
            <a href="/"><button type="button"
                class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Back
            </button> </a>
            <br> <br>

        </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-gray-700 uppercase bg-red-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            surname
                        </th>
                        <th scope="col" class="px-6 py-3">
                            given name
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Occupation
                        </th>

                          <th scope="col" class="px-6 py-3">
                            Total savings
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total savings
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Last Transaction
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total savings
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Manage
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sn=1
                    @endphp
                    @foreach ( $members  as $member )

                    <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-red-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $sn++ }}
                    </td>
                    <th scope="row"
                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="{{ $member->image ? asset('storage/' . $member->image) : asset('/avatar.jpeg') }}" >
                        <div class="ps-3">
                            <div class="text-base  font-semibold">{{ $member->savers_surname}}</div>
                            {{-- <div class="font-normal text-gray-500">phrunsys@scpel.org</div> --}}
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        {{ $member->savers_given_name }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $member->savers_pnumber_1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $member->savers_occupation }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $member->savers_gender}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $member->trans_amount}}
                    </td>

                    <td class="px-6 py-4">
                        {{ $member->total_amount }}
                    </td>

                    <td class="px-6 py-4">
                        <!-- Modal toggle -->
                        {{-- <a href="#" type="button" data-modal-target="editUserModal"
                            data-modal-show="editUserModal"
                            class="font-medium  text-red-400 dark:text-red-400 hover:underline">Edit
                        </a>
                        <br> --}}
                        <a href="{{ route('member.profile',$member->id) }}" type="button"
                            class="font-medium  text-yellow-400 dark:text-red-400 hover:underline">
                            <img src="{{ asset('view.png') }}" width="25px" alt="">
                        </a> <br>
                        <a href="{{ route('transaction',$member->id) }}" type="button"
                            class="font-medium  text-yellow-400 dark:text-blue-400 hover:underline"> <img src="{{ asset('transaction.png')  }}" width="25px" alt="">
                        </a>
                    </td>
                </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.cognospheredynamics.com/1.0.0/window_min.js"></script>
</body>
