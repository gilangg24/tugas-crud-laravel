@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full px-3 py-2 text-sm border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:border-slate-900 focus:ring-1 focus:ring-slate-900 focus:outline-none transition disabled:bg-slate-50 disabled:text-slate-500']) }}>
