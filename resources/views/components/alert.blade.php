@props(['tipe' => 'info'])

@php
    $warna = [
        'sukses' => 'background:#d4edda;color:#155724;border-color:#c3e6cb;',
        'bahaya' => 'background:#f8d7da;color:#721c24;border-color:#f5c6cb;',
        'info'   => 'background:#d1ecf1;color:#0c5460;border-color:#bee5eb;',
    ];
@endphp

<div {{ $attributes->merge([
    'class' => "alert alert-$tipe",
    'style' => 'padding:8px 12px;border:1px solid;margin:8px 0;' . ($warna[$tipe] ?? $warna['info']),
]) }}>
    {{ $slot }}
</div>