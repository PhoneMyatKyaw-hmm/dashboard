@props(['label' => 'Default Label', 'hasError' => false])

<!-- Label -->
<label for="{{ $attributes->get('id') }}"
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white {{ $hasError ? 'text-red-700' : '' }}">
    {{ $label }}
    @if ($attributes->get('required'))
        <span class="text-red-500">*</span>
    @endif
</label>

<!-- Input -->
<input
    {{ $attributes->merge([
        'class' =>
            'text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 text-gray-900 focus:ring-primary focus:border-primary ' .
            ($hasError
                ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500'
                : ''),
    ]) }} />
