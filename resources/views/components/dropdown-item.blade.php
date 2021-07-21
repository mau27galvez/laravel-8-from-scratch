@props(['active' => false])

<a {{ $attributes->merge([
    'class' => 'block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300 ' . ($active ? 'bg-gray-300' : '')
    ]) }} >
    {{ $slot }}
</a>