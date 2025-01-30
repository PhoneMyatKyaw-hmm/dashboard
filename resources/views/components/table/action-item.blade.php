@props(['href' => '#', 'title' => 'Default Title'])

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => 'flex items-center px-4 py-2 space-x-3 hover:bg-gray-100']) }}>
        {{ $slot }}
        <span class="mt-1">{{ $title }}</span>
    </a>
</li>
