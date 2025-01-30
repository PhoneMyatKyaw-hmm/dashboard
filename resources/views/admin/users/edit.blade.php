<x-layouts.app>


    <div class="sticky flex top-0 h-[3rem] border-b bg-white">
        <x-breadcrumb>
            <x-breadcrumb.main :href="route('users.index')" :text="__('user.title')">
                <svg class="w-5 h-5 me-2 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                        clip-rule="evenodd" />
                </svg>
            </x-breadcrumb.main>
            <x-breadcrumb.link :text="__('label.edit')" />
        </x-breadcrumb>
    </div>

    <x-layouts.content>
        <div class="mx-auto w-[90%] m-10 text-gray-900 dark:text-gray-100 ">
            <div class="font-bold text-2xl">
                {{ __('user.edit') }}
            </div>
            <form method="POST" action="{{ route('users.update', [$user->id]) }}">
                @csrf
                @method('PUT')
                <div class="mt-3 border rounded-lg">
                    <div class="grid grid-cols-2 gap-6 p-6">

                        <div class="col-start-1">
                            <x-input id="name" name="name" type="text" required :value="old('name', $user->name)"
                                :hasError="$errors->get('name')" :label="__('user.name')" />
                            <x-input.error :message="$errors->first('name')" />
                        </div>

                        <div class="">
                            <x-input id="email" name="email" type="email" required :value="old('email', $user->email)"
                                :hasError="$errors->get('email')" :label="__('user.email')" />
                            <x-input.error :message="$errors->first('email')" />
                        </div>

                        <div>
                            <x-input id="password" name="password" type="password" required
                                :hasError="$errors->get('password')" :label="__('user.password')" />
                            <x-input.error :message="$errors->first('password')" />
                        </div>

                        <div class="flex items-center mt-6 {{ $errors->get('password') ? 'mt-0' : '' }}">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" {{ $user->is_active == 1 ? 'checked' : '' }} class="sr-only peer">
                                <div
                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                                </div>
                                <span
                                    class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('user.isActive') }}</span>
                            </label>
                        </div>

                        <div class="col-start-1">
                            <div class="space-y-4">
                                <h3 class="text-base font-medium text-gray-900 mb-4">{{ __('user.role') }}</h3>

                                <div class="space-y-4">

                                    @foreach ($roles as $role)
                                        <label class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input type="radio" name="role" value={{ $role->name }} {{ $user->roles->first()->name == $role->name ? 'checked' : '' }}
                                                    class="h-4 w-4 text-primary border-gray-300 focus:ring-primary">
                                            </div>
                                            <div class="ml-3">
                                                <span
                                                    class="block text-sm font-medium text-gray-900">{{ ucfirst($role->name ?? '')}}</span>
                                                <span class="block text-sm text-gray-500">{{ $role->description }}</span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mt-6 justify-end gap-3">
                    <x-primary-button>{{ __('label.submit') }}</x-primary-button>
                    <x-secondary-button>{{ __('label.cancel') }}</x-secondary-button>
                </div>
            </form>

        </div>
    </x-layouts.content>

</x-layouts.app>