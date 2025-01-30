<x-layouts.app>
    <div class="bg-white dark:bg-gray-800 h-[97vh] overflow-auto shadow-sm md:rounded-3xl">

        <div class="sticky flex top-0 h-[3rem] border-b bg-white">
            <x-breadcrumb>
                <x-breadcrumb.main :href="route('users.index')" :text="__('user.title')">
                    <svg class="w-5 h-5 me-2 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                            clip-rule="evenodd" />
                    </svg>
                </x-breadcrumb.main>
            </x-breadcrumb>
        </div>

        <div class="mx-auto w-[90%] m-10 text-gray-900 dark:text-gray-100 ">
            <div class="font-bold text-2xl">
                {{ __('user.title') }}
            </div>


        </div>

    </div>
</x-layouts.app>