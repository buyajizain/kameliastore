@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-emerald-700 bg-emerald-50 rounded-lg p-3 border border-emerald-200']) }}>
        {{ $status }}
    </div>
@endif
