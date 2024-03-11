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
         <!-- Modal content -->
         <form action="{{ route('admin.editGrouping',$id) }}" method="POST" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            @method('PUT')
            @csrf
            <div
                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Group
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editUserModal">
                    <svg class="w-3 h-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Group Name</label>
                        <input name="group_name" value="{{ $group->group_name }}" type="text" name="first-name" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Bonnie" required="">
                            @error('group_name')
                            <code>{{ $message }}</code>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="last-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Group Phone</label>
                        <input  name="group_phone" value="{{ $group->group_phone }}" type="text" name="last-name" id="last-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Green" required="">
                            @error('group_phone')
                            <code>{{ $message }}</code>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="phone-number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Group Location</label>
                        <input name="group_location" value="{{ $group->group_location}}"  type="text" name="phone-number" id="phone-number"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                             required="">
                             @error('group_location')
                             <code>{{ $message }}</code>
                         @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="department"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chairman</label>

                            {{-- <select name="chairman_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"aria-label="Default select example">
                                <option selected>Select chairman</option>
                                @unless ($members->isEmpty())
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->savers_surname}}</option>
                                    @endforeach
                                @else
                                    <option value=""> No Members Found</option>

                                @endunless
                            </select>
                            @error('member')
                                <code>{{ $message }}</code>
                            @enderror --}}

                            <select name="chairman_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-label="Default select example">
                                <option value="">Select chairman</option>
                                @unless ($members->isEmpty())
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" @if(old('chairman_id') == $member->id || $group->chairman_id == $member->id) selected @endif>{{ $member->savers_surname }}</option>
                                    @endforeach
                                @else
                                    <option value="">No Members Found</option>
                                @endunless
                            </select>
                            @error('chairman_id')
                                <code>{{ $message }}</code>
                            @enderror



                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="current-password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Secretary</label>
                            {{-- <select name="secretary_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"aria-label="Default select example">
                                <option selected>Select Secretary</option>
                                @unless ($members->isEmpty())
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->savers_surname}}</option>
                                    @endforeach
                                @else
                                    <option value=""> No Members Found</option>

                                @endunless
                            </select>
                            @error('member')
                                <code>{{ $message }}</code>
                            @enderror --}}
                            <select name="chairman_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-label="Default select example">
                                <option value="">Select Secretary</option>
                                @unless ($members->isEmpty())
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" @if(old('secretary_id') == $member->id || $group->secretary_id == $member->id) selected @endif>{{ $member->savers_surname }}</option>
                                    @endforeach
                                @else
                                    <option value="">No Members Found</option>
                                @endunless
                            </select>
                            @error('secretary_id')
                                <code>{{ $message }}</code>
                            @enderror


                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="new-password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Treasurer  </label>
                          {{-- <select name="treasurer_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"aria-label="Default select example">
                            <option selected>Select Treasurer</option>
                            @unless ($members->isEmpty())
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->savers_surname}}</option>
                                @endforeach
                            @else
                                <option value=""> No Members Found</option>

                            @endunless
                        </select>
                        @error('member')
                            <code>{{ $message }}</code>
                        @enderror --}}

                        <select name="chairman_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-label="Default select example">
                            <option value="">Select Treasurer</option>
                            @unless ($members->isEmpty())
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}" @if(old('treasurer_id') == $member->id || $group->treasurer_id == $member->id) selected @endif>{{ $member->savers_surname }}</option>
                                @endforeach
                            @else
                                <option value="">No Members Found</option>
                            @endunless
                        </select>
                        @error('treasurer_id')
                            <code>{{ $message }}</code>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Edit Group</button>
            </div>
        </form>
        {{-- <script src="/main_script.js"></script> --}}
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.cognospheredynamics.com/1.0.0/window_min.js"></script>
</body>
