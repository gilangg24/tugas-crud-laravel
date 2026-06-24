<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center gap-2 px-4 py-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2 transition']) }}>
    {{ $slot }}
</button>
