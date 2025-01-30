@props(['type' => 'button', 'title' => 'Button'])

<button type="{{ $type }}"
    {{ $attributes->merge(['class' => 'inline-flex items-center space-x-2 px-4 py-3 text-sm font-medium text-white border border-transparent rounded-xl bg-dark gap-x-2 hover:bg-dark-secondary focus:outline-none focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none']) }}>
    {{ $slot }}
    <span>{{ $title }}</span>
</button>
