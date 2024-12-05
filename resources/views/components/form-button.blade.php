<button
    {{ $attributes->merge(['class' => 'rounded-md bg-indigo-600 px-3 py-2 text-sm text-white shadow-sm hover:bg-indigo-500 font-semibold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600', 'type' => 'submit']) }}>
    {{ $slot }}
</button>
