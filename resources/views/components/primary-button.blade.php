<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border-2 uppercase border-solid border-slate-200  bg-gray-800 rounded-lg shadow-lg hover:text-white bg-slate-100 hover:bg-slate-900 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>