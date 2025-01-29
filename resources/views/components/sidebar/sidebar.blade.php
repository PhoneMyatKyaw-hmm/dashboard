<aside x-transaction {{ $attributes->merge(['class' => 'transform transition-all']) }} aria-label="Sidebar">
    <div class="h-full md:px-4 pt-4 overflow-y-auto bg-slate-100 dark:bg-gray-800">
        <div class="flex items-center justify-between pl-2.5 mb-3 h-[2rem]">
            <a href="https://flowbite.com/" class="flex items-center" :class="!open ? 'hidden' : ''">
                <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-7" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <button @click="open = ! open">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="9" y1="3" x2="9" y2="21"></line>
                </svg>
            </button>
        </div>


        <ul class="space-y-1 font-medium text-base mb-[4rem]">

            <x-sidebar.item :href="route('dashboard')" :text="__('Dashboard')" :isSelected="request()->is('dashboard') ? true : false">
                <svg class="w-5 h-5 text-dark transition duration-75  group-hover:text-primary " aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path
                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                    <path
                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                </svg>
            </x-sidebar.item>

            @can('access-users')
                <x-sidebar.item :href="route('users.index')" :text="__('user.title')" :isSelected="request()->is('users') || request()->is('users/*') ? true : false">
                    <svg class="w-5 h-5 text-dark transition duration-75  group-hover:text-primary"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>

                </x-sidebar.item>
            @endcan

        </ul>

        <div class="w-full fixed bottom-0 left-0 z-50">
            <div class="h-5 w-full pointer-events-none bg-gradient-to-t from-slate-100 via-slate-100/50 to-slate-100/0">
            </div>
            <div class="flex items-center justify-between h-[3.2rem] ml-4 pb-4 px-2 bg-slate-100">
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                    alt="user photo">
                <div class="mr-1" :class="!open ? 'hidden' : ''">
                    <p class="text-sm font-semibold">John Doe</p>
                    <p class="text-xs text-gray-400">johndoe@example.com</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mr-2 mt-2" :class="!open ? 'hidden' : ''">
                        <svg class="w-6 h-6 text-dark hover:text-primary" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z"
                                clip-rule="evenodd" />
                        </svg>

                        {{-- <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                        </svg> --}}
                    </button>
                </form>
            </div>
        </div>

    </div>
</aside>