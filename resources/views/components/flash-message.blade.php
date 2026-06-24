@props(['type' => 'success'])

@php
    $classes = match ($type) {
        'error' => 'bg-red-50 border-red-200 text-red-700',
        'info'  => 'bg-slate-50 border-slate-200 text-slate-700',
        default => 'bg-emerald-50 border-emerald-200 text-emerald-700',
    };
@endphp

@if (session($type))
    <div {{ $attributes->merge(['class' => "mb-6 px-4 py-3 border rounded-md text-sm {$classes}"]) }}>
        {{ session($type) }}
    </div>
@endif
