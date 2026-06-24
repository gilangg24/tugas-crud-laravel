@props(['title' => 'Belum ada data', 'description' => null])

<div class="bg-white border border-dashed border-slate-200 rounded-lg px-6 py-12 text-center">
    <h3 class="text-sm font-medium text-slate-900">{{ $title }}</h3>
    @if ($description)
        <p class="mt-1 text-sm text-slate-500">{{ $description }}</p>
    @endif
    @if (isset($action))
        <div class="mt-4">{{ $action }}</div>
    @endif
</div>
