@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => null,
    'hint' => null,
    'required' => false,
    'autofocus' => false,
])

@php
    $inputValue = old($name, $value);
@endphp

<div>
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-slate-700 mb-1.5">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $inputValue }}"
        {{ $attributes->merge(['class' => 'w-full px-3 py-2 text-sm border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:border-slate-900 focus:ring-1 focus:ring-slate-900 focus:outline-none transition disabled:bg-slate-50 disabled:text-slate-500' . ($errors->has($name) ? ' border-red-300 focus:border-red-500 focus:ring-red-500' : '')]) }}
        @if ($required) required @endif
        @if ($autofocus) autofocus @endif
    >

    @if ($hint && !$errors->has($name))
        <p class="mt-1 text-xs text-slate-500">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
