@props(['href' => '#', 'title' => 'Default Title'])

<li>
    <a href="{{ $href }}"
        class="flex items-center px-4 py-2 space-x-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
        {{ $slot }}
        <span class="mt-1">{{ $title }}</span>
    </a>
</li>
