

<div class="display">
    <a href="{{ route('member.export') }}"><button type="button"
        class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Export Excel Member
    </button> </a>

    <a class="padding-left" href="{{ route('member.export') }}"><button type="button" onclick="show_group_member_creation_form()"
        class="text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Register new Saver
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
        </svg>
    </button> </a>

    <a class="padding-left" ><button type="button"
        class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 red:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Delete saver
    </button> </a>
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
            <a href="#" type="button" data-modal-target="editUserModal"
                data-modal-show="editUserModal"
                class="font-medium  text-red-400 dark:text-red-400 hover:underline">Edit
            </a>
            <br>
            <a href="#" type="button" data-modal-target="editUserModal"
                data-modal-show="editUserModal"
                class="font-medium  text-yellow-400 dark:text-red-400 hover:underline">View
            </a>
        </td>
    </tr>
        @endforeach


    </tbody>
</table>









