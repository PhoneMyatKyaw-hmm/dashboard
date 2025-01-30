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
            <x-breadcrumb.link :href="route('roles.create')" :text="__('label.create')" />
        </x-breadcrumb>
    </div>

    <x-layouts.content>
        <div class="font-bold text-2xl">
            {{ __('role.create') }}
        </div>
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="mt-3 border rounded-lg">
                <div class="grid grid-cols-2 gap-6 p-6">

                    <div class="col-start-1">
                        <x-input id="name" name="name" type="text" required :value="old('name', '')"
                            :hasError="$errors->get('name')" :label="__('role.name')" />
                        <x-input.error :message="$errors->first('name')" />
                    </div>

                    <div>
                        <x-input id="description" name="description" type="text" :value="old('description', '')"
                            :hasError="$errors->get('description')" :label="__('role.description')" />
                        <x-input.error :message="$errors->first('description')" />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5 px-6 pb-6">
                    @foreach ($permissionGroups as $group => $permissions)
                        <div x-data="{
                                                    selected: false,
                                                    allChecked: false,
                                                    toggleAll() {
                                                        this.selected = !this.selected
                                                    },
                                                    updateSelectAll() {
                                                        let checkboxes = [...this.$refs.checkboxes.querySelectorAll('.child-checkbox')];
                                                        this.allChecked = checkboxes.length > 0 && checkboxes.every(el => el.checked);
                                                    }
                                                }" class="bg-slate-50 rounded-lg border">
                            <div class="flex justify-between items-center p-3 border-b">
                                <div class="text-lg text-dark">
                                    {{ ucfirst($group) }}
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" x-model="allChecked" @click="toggleAll()" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox"
                                        class="ms-2 mt-[1px] text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('label.selectAll') }}</label>
                                </div>
                            </div>
                            <div x-ref="checkboxes" class="grid grid-cols-2 gap-3 p-3">
                                @foreach ($permissions as $permission)
                                    <div class="flex items-center">
                                        <input id="{{ $permission->name }}" type="checkbox" :checked="selected"
                                            name="permissions[]" @change="updateSelectAll()" value="{{ $permission->name }}"
                                            class="child-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $permission->name }}"
                                            class="ms-2 mt-[1px] text-sm font-medium text-gray-900 dark:text-gray-300">{{ ucwords(str_replace('-', ' ', $permission->name)) }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex mt-6 justify-end gap-3">
                <x-primary-button>{{ __('label.submit') }}</x-primary-button>
                <x-secondary-button>{{ __('label.cancel') }}</x-secondary-button>
            </div>
        </form>
    </x-layouts.content>

</x-layouts.app>