@props(['href', 'text'])

<li class="inline-flex items-center">
    <a href={{ $href }} class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        {{$slot}}
        {{$text}}
    </a>
</li>