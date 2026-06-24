<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center gap-2 px-4 py-2 bg-slate-700 hover:bg-slate-600 active:bg-slate-800 text-white text-sm font-medium rounded-md border border-slate-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-700 focus:ring-offset-2 transition disabled:opacity-50 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
