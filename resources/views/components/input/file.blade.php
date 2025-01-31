@props(['label' => 'Upload File', 'hasError' => false])

<!-- Label -->
<label for="{{ $attributes->get('id') }}"
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white {{ $hasError ? 'text-red-700' : '' }}">
    {{ $label }}
    @if ($attributes->get('required') || $attributes->get('required') === '')
        <span class="text-red-500">*</span>
    @endif
</label>

<!-- Input -->
<input type="file"
    {{ $attributes->merge([
        'class' =>
            'my-2 filepond ' .
            ($hasError
                ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500'
                : ''),
    ]) }} />
