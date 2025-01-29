@props(['value', 'hasError' => false, 'isRequired' => false])

<label {{ $attributes->class(['block mb-2 text-sm font-medium text-gray-900', 'text-red-700' => $hasError])}}>
    {{ $value }}
    @if ($isRequired)
        <span class="text-red-500">*</span>
    @endif
</label>