<form method="POST" action="{{ route('admin.addGroup') }}" id="group_creation_form" class="p-4 mt-14 mx-auto hidden">
    @csrf
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group Name:</label>
    <input name="group_name" value="{{ old('group_name') }}" aria-describedby="helper-text-explanation"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
       placeholder="Group Name">
       @error('name')
       <code>{{ $message }}</code>
   @enderror
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group Phone
       Number:</label>
    <input  name="group_phone" value="{{ old('group_phone') }}"  aria-describedby="helper-text-explanation"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
       placeholder="Phone Number">
       @error('group_phone')
       <code>{{ $message }}</code>
   @enderror

   <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
    Bank Account:</label>
 <input  name="group_bank_account" value="{{ old('group_bank_account') }}"   aria-describedby="helper-text-explanation"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    placeholder="Location">
    @error('group_bank_account')
    <code>{{ $message }}</code>
@enderror


    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group
       Location:</label>
    <input  name="group_location" value="{{ old('group_location') }}"   aria-describedby="helper-text-explanation"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
       placeholder="Location">
       @error('group_location')
       <code>{{ $message }}</code>
   @enderror


    <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
       <button  type="submit"
          class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Create group
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
             fill="none" viewBox="0 0 14 10">
             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
       </button>
    </div>
 </form>

