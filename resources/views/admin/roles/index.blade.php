<x-layouts.app>

    <div class="sticky flex top-0 h-[3rem] border-b bg-white">
        <x-breadcrumb>
            <x-breadcrumb.main :href="route('roles.index')" :text="__('role.title')">
                <svg class="w-5 h-5 me-2 text-dark " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                        clip-rule="evenodd" />
                    <path
                        d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                </svg>
            </x-breadcrumb.main>
        </x-breadcrumb>
    </div>

    <x-layouts.content>

        <div class="flex justify-between items-center">
            <div class="font-bold text-2xl">
                {{ __('role.title') }}
            </div>
            <a href="{{ route(name: 'roles.create') }}">
                <x-primary-button>{{ __('role.createRole') }}</x-primary-button>
            </a>
        </div>
        
        <div class="mt-7" x-data="{ deleteUrl: '' }">
            <x-table>
                <x-slot name="header">
                    <x-table.header>
                        {{ __('label.no') }}
                    </x-table.header>
                    <x-table.header>
                        {{ __('role.name') }}
                    </x-table.header>
                    <x-table.header>
                        {{ __('role.description') }}
                    </x-table.header>
                    <x-table.header>
                        {{ __('role.permission') }}
                    </x-table.header>
                    <x-table.header>
                        {{ __('label.action') }}
                    </x-table.header>
                </x-slot>

                <x-slot name="body">
                    @foreach ($roles as $role)
                    <x-table.row>
                        <x-table.data>{{ $loop->iteration }}</x-table.data>
                        <x-table.data>{{ $role->name }}</x-table.data>
                        <x-table.data>{{ $role->description }}</x-table.data>
                        <x-table.data>
                            <div class="gird gap-1">
                                @foreach ($role->permissions as $permission)
                                    <x-typography.badge type="success" class="m-1">{{ $permission->name }}</x-typography.badge>
                                @endforeach
                            </div>
                        </x-table.data>
                        <x-table.actions>
                            <x-table.action-item :href="route('roles.edit', [$role->id])" title="Edit">
                                <x-icons.edit></x-icons.edit>
                            </x-table.action-item>
                                <button id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal" data-url="{{ route('roles.destroy', $role->id) }}"  @click="deleteUrl = $el.getAttribute('data-url')" type="button">
                                    <x-table.action-item title="Delete">
                                        <x-icons.delete></x-icons.delete>
                                    </x-table.action-item>
                                </button>
                        </x-table.actions>
                    </x-table.row>
                    @endforeach
              
                </x-slot>
            </x-table>

            <div  id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                        <div class="flex justify-center items-center space-x-4">
                            <form method="POST" :action="deleteUrl">
                                @csrf
                                @method('DELETE')
                                <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    No, cancel
                                </button>
                                <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    Yes, I'm sure
                                </button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </x-layouts.content>

</x-layouts.app>