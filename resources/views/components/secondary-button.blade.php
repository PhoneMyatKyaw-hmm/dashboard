<button {{ $attributes->merge(['type' => 'button', 'class' => 'text-white bg-dark hover:bg-dark-secondary focus:ring-4 focus:outline-none focus:ring-dark font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
