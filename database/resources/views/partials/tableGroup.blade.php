
<div class="display">
    <a href="{{ route('group') }}"><button type="button"
        class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Export Excel Group
    </button> </a>

 <button type="button" onclick="show_group_creation_form()"
        class="text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Register new Group
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
        </svg>
    </button>

    <a class="padding-left" ><refbutton type="button"
        class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 red:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Delete Group
    </button> </a>
</div>

<table
class="w-[100%] text-sm text-left border-b rtl:text-right text-gray-500 dark:text-gray-400">
<thead
    class="text-xs text-gray-700 uppercase bg-red-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">
             #
        </th>
        <th scope="col" class="px-6 py-3">
            Group name
        </th>
        <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
                Group Phone

            </div>
        </th>
        <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
                Group Location

            </div>
        </th>
        <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
                Group chairman

            </div>
        </th>
        <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
                Group treasurer

            </div>
        </th>
        <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
                Group secretery

            </div>
        </th>
        <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
                No of Indivuals

            </div>
        </th>
        <th scope="col" class="px-6 py-3">
            <span class="sr-only">Edit</span>
        </th>
    </tr>
</thead>
<tbody>
    {{-- @unless ( $groups isEmpty()) --}}
    @php
        $sn=1;
        $treasurer_name = null;

    @endphp
    @foreach ($groups as $group )

    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <th scope="row"
            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $sn++ }}
        </th>
        <td class="px-6 py-4">
            {{ $group->group_name }}
        </td>
        <td class="px-6 py-4">
            {{ $group->group_phone }}
        </td>
        <td class="px-6 py-4">
            {{ $group->group_location }}
        </td>
        <td class="px-6 py-4">
            {{-- {{ $group->chairmain }} --}}
             {{-- {{ $group->secretery }} --}}
             @if ($group->chairman_id)
             @php
                 $chairman = \App\Models\Member::find($group->chairman_id); // Assuming Member is your model
             @endphp

             @if ($chairman)
                 <p>{{ $chairman->savers_surname }} {{ $chairman->savers_given_name }}</p>
             @endif
         @else
         <code>
            <a href="{{ route('admin.editGroup', ['id' => $group->id]) }}" class="color-blue">Assign chairman</a>
         </code>

         @endif



        </td>
        <td class="px-6 py-4">
            @if ($group->treasurer_id)
            @php
                $treasurer = \App\Models\Member::find($group->treasurer_id); // Assuming Member is your model
            @endphp

            @if ($treasurer)
                <p>{{ $treasurer->savers_surname }} {{ $treasurer->savers_given_name }}</p>
            @endif
        @else
        <code>
            <a href="{{ route('admin.editGroup', ['id' => $group->id]) }}" class="color-blue">Assign treasurer</a>
        </code>

        @endif


        </td>
        <td class="px-6 py-4">
            {{-- {{ $group->secretery }} --}}
            @if ($group->secretary_id)
            @php
                $secretary = \App\Models\Member::find($group->secretary_id); // Assuming Member is your model
            @endphp

            @if ($secretary)
                <p>{{ $secretary->savers_surname }} {{ $secretary->savers_given_name }}</p>
            @endif
        @else
        <code>
            <a href="{{ route('admin.editGroup', ['id' => $group->id]) }}" class="color-blue">Assign secretary</a>
        </code>

        @endif


        </td>
        <td class="px-6 py-4">
            {{ $group->no_individual }}
        </td>
        <td class="px-6 py-4 text-right">
            <a href="{{ route('admin.editGroup', ['id' => $group->id]) }}"
                class="font-medium text-red-400 dark:text-red-400 hover:underline"><img src="{{ asset('edit.png') }}" width="30px" alt=""></a>
                            <a href="{{ route('allMember', ['id' => $group->id]) }}"
                class="font-medium text-yellow-400 dark:text-red-400 hover:underline"><img src="{{ asset('members.png') }}" width="30px" alt=""></a>
                <a href="{{ route('groupdetail', ['id' => $group->id]) }}"
                    class="font-medium text-yellow-400 dark:text-red-400 hover:underline"><img src="{{ asset('view.png') }}" width="30px" alt=""></a>

                {{-- <form method="post"
                action="{{ route('deletegroup',$group->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Del</button>
            </form> --}}
        </td>
    </tr>


    @endforeach

    {{-- @else
    NO group found
    @endunless --}}


</tbody>
</table>



