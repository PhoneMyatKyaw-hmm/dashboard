<x-layouts.app>
    <div class="bg-white dark:bg-gray-800 h-[98vh] overflow-auto shadow-sm md:rounded-3xl">

        <div class="sticky flex top-0 h-[3rem] border-b bg-white">
            <x-breadcrumb>
                <x-breadcrumb.main :href="route('dashboard')" text="Home">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                </x-breadcrumb.main>
                <x-breadcrumb.link :href="route('dashboard')" text="Create" />
            </x-breadcrumb>
        </div>

        <div class="mx-auto w-[90%] m-10 text-gray-900 dark:text-gray-100 ">
            <div class="font-bold text-2xl">
                Users Create
            </div>

            <form>
                <div class="mt-3 border rounded-lg">
                    <div class="grid grid-cols-2 gap-6 p-6">

                        <div class="col-start-1">
                            <label for="name" class="{{ $errors->get('name') ? 'text-red-700' : 'text-gray-900' }} block mb-2 text-sm font-medium">Name</label>
                            <input type="name" id="name"
                                    class="
                                    {{-- {{ true ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-primary focus:border-primary' }} --}}
                                    border text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500" required />
                            @if ($errors->get('name'))
                                <p class="mt-2 text-sm  text-red-600 ">
                                    <span>{{ $errors->first('name') }}</span>
                                </p>
                            @endif
                        </div>
                        {{-- <div>
                            <label for="username-error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Your name</label>
                            <input type="text" id="username-error" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500" placeholder="Bonnie Green">
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username already taken!</p>
                        </div> --}}

                        <div class="col-start-1">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email"
                                    class="
                                    {{ true ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-primary focus:border-primary' }}
                                    text-sm rounded-lg block w-full p-2.5" placeholder="name@flowbite.com" required />
                        </div>
                        <div class="">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>

                        <div class="col-start-1">
                            <div class="space-y-4">
                              <h3 class="text-base font-medium text-gray-900 mb-4">Role</h3>

                              <div class="space-y-4">
                                <!-- Administrator Option -->
                                <label class="flex items-start">
                                  <div class="flex items-center h-5">
                                    <input type="radio" name="role" checked class="h-4 w-4 text-primary border-gray-300 focus:ring-primary">
                                  </div>
                                  <div class="ml-3">
                                    <span class="block text-sm font-medium text-gray-900">Administrator</span>
                                    <span class="block text-sm text-gray-500">Administrator users can perform any action.</span>
                                  </div>
                                </label>

                                <!-- Editor Option -->
                                <label class="flex items-start">
                                  <div class="flex items-center h-5">
                                    <input type="radio" name="role" class="h-4 w-4 text-primary border-gray-300 focus:ring-primary">
                                  </div>
                                  <div class="ml-3">
                                    <span class="block text-sm font-medium text-gray-900">Editor</span>
                                    <span class="block text-sm text-gray-500">Editor users have the ability to read, create, and update.</span>
                                  </div>
                                </label>

                                <!-- Viewer Option -->
                                <label class="flex items-start">
                                  <div class="flex items-center h-5">
                                    <input type="radio" name="role" class="h-4 w-4 text-primary border-gray-300 focus:ring-primary">
                                  </div>
                                  <div class="ml-3">
                                    <span class="block text-sm font-medium text-gray-900">Viewer</span>
                                    <span class="block text-sm text-gray-500">Viewer users only have the ability to read. Create, and update are restricted.</span>
                                  </div>
                                </label>
                              </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" checked>
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Is Active</span>
                            </label>
                        </div>

                        {{-- <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                        </div> --}}
                    </div>
                </div>
                <div class="flex mt-6 justify-end gap-3">
                    <button type="submit" class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    <button type="submit" class="text-white bg-dark hover:bg-dark-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>
                </div>

            </form>

        </div>

    </div>
</x-layouts.app>
