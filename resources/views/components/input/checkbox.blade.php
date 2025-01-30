@props(['label' => 'Default checkbox', 'hasError' => false])

<div class="flex items-center">
    <input type="checkbox"
        {{ $attributes->merge([
            'class' =>
                'shrink-0 mt-0.5 rounded text-primary disabled:opacity-50 disabled:pointer-events-none ' .
                ($hasError ? 'border-red-700 focus:ring-red-500' : 'border-gray-500 focus:ring-secondary'),
        ]) }}>
    <label for="{{ $attributes->get('id') }}"
        class="mt-1 text-sm text-gray-500 ml-3 {{ $hasError ? 'text-red-700' : '' }}">
        {{ $label }}
    </label>
</div>
