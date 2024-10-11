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


                @if (url()->previous()!= url()->current())
                    <a href="{{ url()->previous() }}">
                        <button type="button"
                class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Back
            </button>
                    </a>
                @endif
            <a href="{{ route('transaction.export',$members->id) }}">
                <button type="button"
        class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Export Excell
    </button>
            </a>

        </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-gray-700 uppercase bg-red-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Transaction Id

                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>

                          <th scope="col" class="px-6 py-3">
                            Old Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            new Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Description
                        </th>



                    </tr>
                </thead>
                <tbody>
                    @php
                        $sn=1
                    @endphp
                    {{-- @dd($transactions); --}}
                    @foreach ( $transactions  as $transaction )

                    <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-red-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $sn++ }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $transaction->transaction_id }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $transaction->amount }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->old_amount }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->new_amount}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->description}}
                    </td>

                    {{-- <td class="px-6 py-4">
                        {{ $transactions->total_amount }}
                    </td> --}}

                    <td class="px-6 py-4">
                        <!-- Modal toggle -->

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
