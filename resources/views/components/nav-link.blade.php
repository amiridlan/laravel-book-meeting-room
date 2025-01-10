@props(['active' => false])

<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-white hover:bg-gray-700 hover:text-gray-300' }}
    rounded-md px-3 py-5 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
    {{ $slot }}
</a>
