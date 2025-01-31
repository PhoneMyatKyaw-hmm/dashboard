<td {{ $attributes->merge(['class' => 'flex items-center px-6 py-4']) }} x-data="{ dropdownId: 'dropdown-' + Math.random().toString(36).substr(2, 9) }">

    <button :id="dropdownId + '-button'" :data-dropdown-toggle="dropdownId"
        class="hover:bg-[#d3d7de] group p-1 rounded-lg transition-colors duration-200 ease-linear" type="button">
        <svg class="block w-6 h-6 text-[#6b7280] group-hover:text-black" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="4" d="M6 12h0m6 0h0m6 0h0"></path>
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div :id="dropdownId"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
        <ul class="flex flex-col justify-center py-2 space-y-2" :aria-labelledby="dropdownId + '-button'">
            {{ $slot }}
        </ul>
    </div>

</td>
