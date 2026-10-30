@props(['status', 'invert' => false])

@php
    $label = \App\Models\Laporan::STATUSES[$status] ?? ucfirst($status);
@endphp

@if($invert)
    {{-- On dark wine backgrounds --}}
    @if($status === 'pending')
        <span class="inline-flex items-center gap-1.5 rounded-md bg-[#FAF4ED] px-2.5 py-1 font-mono text-[11px] font-semibold tracking-wide text-[#7C3D0E] border border-[#ECD9C5]">
            <span class="h-1.5 w-1.5 rounded-full bg-[#D97706]"></span>
            {{ $label }}
        </span>
    @elseif($status === 'proses')
        <span class="inline-flex items-center gap-1.5 rounded-md bg-white px-2.5 py-1 font-mono text-[11px] font-semibold tracking-wide text-[#4A151C] shadow-2xs">
            <span class="h-1.5 w-1.5 rounded-full bg-[#4A151C] animate-pulse"></span>
            {{ $label }}
        </span>
    @else
        <span class="inline-flex items-center gap-1.5 rounded-md bg-[#EBF4EE] px-2.5 py-1 font-mono text-[11px] font-semibold tracking-wide text-[#1A4B2F] border border-[#C5DEC9]">
            <span class="h-1.5 w-1.5 rounded-full bg-[#16A34A]"></span>
            {{ $label }}
        </span>
    @endif
@else
    {{-- On light alabaster / white backgrounds --}}
    @if($status === 'pending')
        <span class="inline-flex items-center gap-1.5 rounded-md bg-[#FAF5EE] px-2.5 py-1 font-mono text-[11px] font-semibold tracking-wide text-[#824410] border border-[#E8D4BE]">
            <span class="h-1.5 w-1.5 rounded-full bg-[#D97706]"></span>
            {{ $label }}
        </span>
    @elseif($status === 'proses')
        <span class="inline-flex items-center gap-1.5 rounded-md bg-[#4A151C] px-2.5 py-1 font-mono text-[11px] font-semibold tracking-wide text-white">
            <span class="h-1.5 w-1.5 rounded-full bg-[#E5B5BC] animate-pulse"></span>
            {{ $label }}
        </span>
    @else
        <span class="inline-flex items-center gap-1.5 rounded-md bg-[#EEF5F0] px-2.5 py-1 font-mono text-[11px] font-semibold tracking-wide text-[#194C30] border border-[#C9DFD0]">
            <span class="h-1.5 w-1.5 rounded-full bg-[#16A34A]"></span>
            {{ $label }}
        </span>
    @endif
@endif
