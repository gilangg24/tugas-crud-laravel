@props([
    'name',
    'label' => null,
    'options' => [],
    'value' => null,
    'placeholder' => '-- Pilih --',
    'required' => false,
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

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->merge(['class' => 'w-full px-3 py-2 text-sm border border-slate-300 rounded-md shadow-sm focus:border-slate-900 focus:ring-1 focus:ring-slate-900 focus:outline-none transition' . ($errors->has($name) ? ' border-red-300 focus:border-red-500 focus:ring-red-500' : '')]) }}
        @if ($required) required @endif
    >
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @selected((string) $inputValue === (string) $optionValue)>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
