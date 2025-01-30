 <td {{ $attributes->merge(['class' => 'relative flex items-center px-6 py-4']) }} x-data="{ actionOpen: false }">

     <button @click="actionOpen = !actionOpen" aria-haspopup="true" aria-expanded="actionOpen.toString()"
         class="hover:bg-[#d3d7de] group p-1 rounded-lg transition-colors duration-200 ease-linear">
         <svg class="block w-6 h-6 text-[#6b7280] group-hover:text-black" aria-hidden="true"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
             <path stroke="currentColor" stroke-linecap="round" stroke-width="4" d="M6 12h0m6 0h0m6 0h0">
             </path>
         </svg>
     </button>

     <div x-show="actionOpen" x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="absolute top-[80%] right-[20%] shadow-lg rounded-lg w-[180px] bg-white z-10"
         @click.outside="actionOpen = false" @keydown.escape.window="actionOpen = false">
         <ul class="flex flex-col justify-center px-2 py-4 space-y-2">
             {{ $slot }}
         </ul>
     </div>
 </td>
