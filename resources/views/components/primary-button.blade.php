<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
