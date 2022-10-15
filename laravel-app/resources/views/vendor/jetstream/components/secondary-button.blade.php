<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-reddarken text-white active:bg-reddarken font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150']) }}>
    {{ $slot }}
</button>
