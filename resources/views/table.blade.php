<x-layouts.app>
    <div class="bg-white dark:bg-gray-800 h-[98vh] overflow-x-hidden overflow-y-auto shadow-sm md:rounded-3xl">

        <div class="sticky flex top-0 h-[3rem] border-b bg-white">
            <x-breadcrumb>
                <x-breadcrumb.main :href="route('dashboard')" text="Home">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                </x-breadcrumb.main>
                <x-breadcrumb.link :href="route('dashboard')" text="Create" />
            </x-breadcrumb>
        </div>

        <div class="mx-auto w-[90%] h-auto mt-10 text-gray-900 dark:text-gray-100 ">
            <div class="text-2xl font-bold">
                Tables
            </div>

            <div class="mt-5">
                <x-table></x-table>
            </div>

            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis, eum inventore! Facere quibusdam,
            perspiciatis at sequi porro, eligendi nisi, fugit quod soluta molestiae suscipit perferendis doloremque
            delectus incidunt. Cupiditate, ducimus?

        </div>
    </div>
</x-layouts.app>
