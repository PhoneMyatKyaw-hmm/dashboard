<x-layouts.app>

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

        <x-layouts.content>
            <div class="flex justify-between items-center">
                <div class="font-bold text-2xl">
                    {{ __('user.title') }}
                </div>
                <a href="{{ route('users.create') }}">
                    <x-primary-button :href="route('users.create')">{{ __('user.createUser') }}</x-primary-button>
                </a>
            </div>
 
            <div class="mt-7" x-data="{ deleteUrl: '' }">
                <x-table>
                    <x-slot name="header">
                        <x-table.header>
                            {{ __('label.no') }}
                        </x-table.header>
                        <x-table.header>
                            {{ __('user.name') }}
                        </x-table.header>
                        <x-table.header>
                            {{ __('user.email') }}
                        </x-table.header>
                        <x-table.header>
                            {{ __('user.status') }}
                        </x-table.header>
                        <x-table.header>
                            {{ __('label.action') }}
                        </x-table.header>
                    </x-slot>
    
                    <x-slot name="body">
                        @foreach ($users as $user)
                        <x-table.row>
                            <x-table.data>{{ $loop->iteration }}</x-table.data>
                            <x-table.data>{{ $user->name }}</x-table.data>
                            <x-table.data>{{ $user->email }}</x-table.data>
                            <x-table.data>
                                @if ($user->is_active)
                                    <x-typography.badge type="success">{{ __('user.active') }}</x-typography.badge>
                                @else
                                    <x-typography.badge type="error">{{ __('user.inactive') }}</x-typography.badge>
                                @endif
                            </x-table.data>
                            <x-table.actions>
                                <x-table.action-item :href="route('users.edit', [$user->id])" title="Edit">
                                    <x-icons.edit></x-icons.edit>
                                </x-table.action-item>
                                    <button id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal" data-url="{{ route('users.destroy', $user->id) }}"  @click="deleteUrl = $el.getAttribute('data-url')" type="button">
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

<script>
    console.log('hello');
</script>
