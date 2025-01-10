<button
    {{ $attributes->merge([
        'class' => 'relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium bg-white border border-gray-300 rounded-r rounded-l leading-5
                                                hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-grey-500 transition ease-in-out duration-100',
    ]) }}>
    {{ $slot }}</button>
