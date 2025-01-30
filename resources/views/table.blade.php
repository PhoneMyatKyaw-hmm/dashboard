<x-layouts.app>

    <div class="sticky flex top-0 h-[3rem] border-b bg-white">
        <x-breadcrumb>
            <x-breadcrumb.main :href="route('dashboard')" text="Home">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
            </x-breadcrumb.main>
            <x-breadcrumb.link :href="route('dashboard')" text="Table" />
        </x-breadcrumb>
    </div>

    <x-layouts.content>

        <div class="text-2xl font-bold">
            Tables
        </div>

        <div class="mt-5">
            <x-table>
                <x-slot name="header">
                    <x-table.header>
                        ID
                    </x-table.header>
                    <x-table.header>
                        Product name
                    </x-table.header>
                    <x-table.header>
                        Color
                    </x-table.header>
                    <x-table.header>
                        Category
                    </x-table.header>
                    <x-table.header>
                        Accessories
                    </x-table.header>
                    <x-table.header>
                        Available
                    </x-table.header>
                    <x-table.header>
                        Price
                    </x-table.header>
                    <x-table.header>
                        Weight
                    </x-table.header>
                    <x-table.header>
                        Actions
                    </x-table.header>
                </x-slot>

                <x-slot name="body">
                    <x-table.row>
                        <x-table.data>1</x-table.data>
                        <x-table.data>Apple MacBook Pro 17"</x-table.data>
                        <x-table.data>Silver</x-table.data>
                        <x-table.data>Laptop</x-table.data>
                        <x-table.data>Yes</x-table.data>
                        <x-table.data>Yes</x-table.data>
                        <x-table.data>$2999</x-table.data>
                        <x-table.data>3.0 lb.</x-table.data>
                        <x-table.actions>
                            <x-table.action-item title="View">
                                <x-icons.view></x-icons.view>
                            </x-table.action-item>
                            <x-table.action-item title="Edit">
                                <x-icons.edit></x-icons.edit>
                            </x-table.action-item>
                            <x-table.action-item title="Delete">
                                <x-icons.delete></x-icons.dele>
                            </x-table.action-item>
                        </x-table.actions>
                    </x-table.row>
                    <x-table.row>
                        <x-table.data>1</x-table.data>
                        <x-table.data>Apple MacBook Pro 17"</x-table.data>
                        <x-table.data>Silver</x-table.data>
                        <x-table.data>Laptop</x-table.data>
                        <x-table.data>Yes</x-table.data>
                        <x-table.data>Yes</x-table.data>
                        <x-table.data>$2999</x-table.data>
                        <x-table.data>3.0 lb.</x-table.data>
                        <x-table.actions>
                            <x-table.action-item title="View">
                                <x-icons.view></x-icons.view>
                            </x-table.action-item>
                            <x-table.action-item title="Edit">
                                <x-icons.edit></x-icons.edit>
                            </x-table.action-item>
                            <x-table.action-item title="Delete">
                                <x-icons.delete></x-icons.dele>
                            </x-table.action-item>
                        </x-table.actions>
                    </x-table.row>
                </x-slot>
            </x-table>
        </div>

    </x-layouts.content>

</x-layouts.app>
