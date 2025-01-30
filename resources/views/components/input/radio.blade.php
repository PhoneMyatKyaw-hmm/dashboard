@props(['label' => 'Default radio', 'hasError' => false])

<div class="flex items-center">
    <input type="radio"
        {{ $attributes->merge([
            'class' =>
                'inline-flex shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800 ' .
                ($hasError ? 'border-red-700 focus:ring-red-500' : ''),
        ]) }}>
    <label for="{{ $attributes->get('id') }}"
        class="text-sm text-gray-500 ml-2 dark:text-neutral-400 {{ $hasError ? 'text-red-700' : '' }}">
        {{ $label }}
    </label>
</div>
