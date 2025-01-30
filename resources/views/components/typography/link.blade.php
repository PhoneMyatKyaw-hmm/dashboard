@props(['href' => '#', 'title' => 'Link'])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'inline-flex items-center space-x-2 px-4 py-3 text-sm font-medium text-white bg-dark border border-transparent rounded-xl gap-x-2 hover:bg-dark-secondary focus:outline-none focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none']) }}>
    {{ $slot }}
    <span>{{ $title }}</span>
</a>
