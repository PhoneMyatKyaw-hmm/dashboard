@props(['message'])

@if ($message)
    <p {{ $attributes->merge(['class' => 'mt-2 text-sm text-red-600']) }}>
        <span>{{ $message }}</span>
    </p>
@endif
