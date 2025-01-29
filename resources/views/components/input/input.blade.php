@props(['hasError' => false])

<input {{ $attributes->class(['text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 text-gray-900 focus:ring-primary focus:border-primary', 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' => $hasError])}}/>