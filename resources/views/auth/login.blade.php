<x-layouts.guest>
    <div class="my-auto">
        <div class="flex flex-col">
            <h1 class="text-3xl mx-auto font-bold mb-2">Welcome back!</h1>
            <p class="text-gray-600 mx-auto mb-8">Please enter your details</p>
        </div>

        <div class="mt-8 max-w-sm mx-auto">


          <form class="space-y-7" method="POST" action="{{ route('login') }}">
            @csrf


            <div class="relative z-0">
                <input type="email"
                        id="email" name="email" value="{{ old('email')}}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer
                            {{ $errors->get('email') ? 'border-red-600 focus:border-red-600' : 'focus:border-primary border-gray-300' }}"
                        placeholder=" " />
                <label for="email"
                    class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto
                        {{ $errors->get('email') ? 'text-red-600' : 'text-gray-500' }}">
                    Email
                </label>
                @if ($errors->get('email'))
                    <p id="email_error" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        <span>{{ $errors->get('email')[0] }}</span>
                    </p>
                @endif
            </div>

            <div x-data="{showPassword: false}" class="relative z-0">
                <input :type="showPassword ? 'text' : 'password'"
                        id="password" name="password" value=""
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer
                            {{ $errors->get('email') ? 'border-red-600 focus:border-red-600' : 'focus:border-primary border-gray-300' }}"
                        placeholder=" " />
                <label for="password"
                    class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto
                        {{ $errors->get('email') ? 'text-red-600' : 'text-gray-500' }}">
                    Password
                </label>
                <button @click="showPassword = !showPassword" type="button" class="absolute right-3 top-1/2 -translate-y-1/2 {{ $errors->get('email') ? 'top-1/3' : 'top-1/2'}}">
                    <svg class="w-5 h-5 text-gray-400 dark:text-white" :class="{'block': !showPassword, 'hidden': showPassword }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <svg class="w-5 h-5 text-gray-400 dark:text-white" :class="{'block': showPassword, 'hidden': !showPassword }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>


                </button>
                @if ($errors->get('email'))
                    <p id="password" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        <span>{{ $errors->get('email')[0] }}</span>
                    </p>
                @endif
            </div>

            <div class="flex items-center justify-end">

              <a href="#" class="text-sm text-gray-600 hover:underline">Forgot password?</a>
            </div>

            <button type="submit" class="w-full bg-dark text-white py-3 rounded-lg hover:bg-dark-secondary transition-colors">
              Log In
            </button>

          </form>

        </div>
    </div>
</x-layouts.guest>
