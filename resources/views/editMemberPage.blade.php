<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" /> --}}

</head>
<body>


    <form method="POST" action="{{ route('memberediting',$id) }}" enctype="multipart/form-data" id="group_member_registration_form"
    class="p-4 mt-14 mx-auto hidden">
    @method('PUT')

    @csrf


    <select name="group_id" class="form-select" aria-label="Default select example">
        <option selected>Select the Group</option>
        @unless ($groups->isEmpty())
            @foreach ($groups as $group)

                {{-- <option value="{{ $group->id }}">{{ $group->group_name }}</option> --}}
                <option value="{{ $group->id }}" @if ($group->id == $selectedGroupId) selected @endif>
                    {{ $group->group_name }}
                </option>


                {{-- <option value="{{ $group->id }}" @if ($group->id ) selected @endif>

                    {{ $group->group_name }}
                </option> --}}

            @endforeach
        @else
            <option value=""> No Members Found</option>

        @endunless
    </select>
    @error('group')
        <code>{{ $message }}</code>
    @enderror

    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Surname:</label>
    <input name="savers_surname" value="{{ $member->savers_surname }}" aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="John">
    @error('savers_surname')
        <code>{{ $message }}</code>
    @enderror

    <b>Image</b>:
    <input type="file" name="image" value="{{ old('image') }}" type="file"   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
    @error('image')
    <code>{{ $message }}</code>
   @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Given Name:</label>
    <input name="savers_given_name" value="{{ $member->savers_given_name }}"  aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Smith">
        @error('savers_given_name')
        <code>{{ $message }}</code>
    @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age:</label>
    <input name="savers_age" value="{{ $member->savers_age}}"  aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="23">
        @error('savers_age')
        <code>{{ $message }}</code>
    @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nationality:</label>
    <input name="savers_nationality" value="{{  $member->savers_nationality }}"  aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Ugandan">
        @error('savers_nationality')
        <code>{{ $message }}</code>
    @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIN:</label>
    <input name="savers_nin" value="{{  $member->savers_nin }}" aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="CMYURI78EUJ8E7RJL">
        @error('savers_nin')
        <code>{{ $message }}</code>
    @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address:</label>
    <input name="savers_address" value="{{  $member->savers_address }}"  aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Kampala">
        @error('savers_address')
        <code>{{ $message }}</code>
    @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number 1
        1:</label>
    <input name="savers_pnumber_1" value="{{  $member->savers_pnumber_1 }}"   aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="07 xxx xxxxx">
        @error('savers_pnumber_1')
        <code>{{ $message }}</code>
    @enderror

    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number 2
        2:</label>
    <input  name="savers_pnumber_2" value="{{ $member->savers_pnumber_2}}" aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="07 xxx xxxxx">
        @error('savers_pnumber_2')
        <code>{{ $message }}</code>
    @enderror

    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Occupation:</label>
    <input name="savers_occupation" value="{{  $member->savers_occupation }}"  aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Shop attendant">
        @error('savers_occupation')
        <code>{{ $message }}</code>
    @enderror

    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender:</label>
    <input name="savers_gender" value="{{  $member->savers_gender }}"   aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Male">
        @error('savers_gender')
        <code>{{ $message }}</code>
    @enderror

    {{-- savers_gender --}}


    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marital
        Status:</label>
    <input name="savers_marital_status" value="{{  $member->savers_marital_status }}"   aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Married">
        @error('savers_marital_status')
        <code>{{ $message }}</code>
    @enderror

    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Next of kin
        name:</label>
    <input name="savers_nok_name" value="{{  $member->savers_nok_name }}" aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="John Doe">
        @error('savers_nok_name')
        <code>{{ $message }}</code>
    @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Next of kin
        address:</label>
    <input name="savers_nok_address" value="{{  $member->savers_nok_address }}" aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Kansanga">
        @error('savers_nok_address')
        <code>{{ $message }}</code>
    @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Next of kin
        number:</label>
    <input name="savers_nok_number" value="{{ $member->savers_nok_number }}"   aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="07 xxx xxxxx">
        @error('savers_nok_number')
        <code>{{ $message }}</code>
    @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Next of Kin Occupation:</label>
    <input name="savers_nok_occupation" value="{{  $member->savers_nok_occupation }}"  aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Farmer">
        @error('savers_nok_occupation')
        <code>{{ $message }}</code>
    @enderror

    <b>Next of Kin Relationship</b>
    <input name="nok_relationship" value="{{  $member->nok_relationship }}"  aria-describedby="helper-text-explanation"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Brother /sister / parent / guardian">
        @error('nok_relationship')
        <code>{{ $message }}</code>
    @enderror

    <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
        <button type="submit"
            class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Complete registration
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </button>
    </div>
</form>


</body>
</html>
