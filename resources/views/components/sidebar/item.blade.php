@props(['href', 'text', 'isSelected' => false])

<li>
    <a href="{{ $href }}" {{ $attributes->class(['flex items-center h-[2.7rem] p-2 text-dark hover:bg-white rounded-xl hover:text-primary group', 'bg-white rounded-xl shadow-sm border' => $isSelected]) }}>
        {{ $slot }}
        <span class="ms-3" :class="!open ? 'hidden' : ''">{{ $text }}</span>
    </a>
</li>