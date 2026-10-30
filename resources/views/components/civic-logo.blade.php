@props([
    'size' => 'md', // sm, md, lg, xl
    'variant' => 'wine', // wine, white, brass
])

@php
    $dimensions = match($size) {
        'sm' => 'h-8 w-8',
        'md' => 'h-10 w-10',
        'lg' => 'h-12 w-12',
        'xl' => 'h-16 w-16',
        default => 'h-10 w-10',
    };
@endphp

<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="{{ $dimensions }} shrink-0 drop-shadow-xs transition duration-200" aria-hidden="true">
    {{-- Outer Medallion Crest --}}
    <rect width="64" height="64" rx="16" fill="{{ $variant === 'white' ? '#FFFFFF' : '#4A151C' }}" />
    <rect x="2" y="2" width="60" height="60" rx="14" stroke="{{ $variant === 'white' ? '#4A151C' : '#C59B27' }}" stroke-width="1.25" stroke-opacity="0.8" />
    <rect x="5" y="5" width="54" height="54" rx="11" stroke="{{ $variant === 'white' ? '#4A151C' : '#FAF7F5' }}" stroke-width="0.75" stroke-opacity="0.4" stroke-dasharray="2 2" />

    {{-- Corner Brass Rivets --}}
    <circle cx="8" cy="8" r="1.5" fill="{{ $variant === 'white' ? '#4A151C' : '#C59B27' }}" />
    <circle cx="56" cy="8" r="1.5" fill="{{ $variant === 'white' ? '#4A151C' : '#C59B27' }}" />
    <circle cx="8" cy="56" r="1.5" fill="{{ $variant === 'white' ? '#4A151C' : '#C59B27' }}" />
    <circle cx="56" cy="56" r="1.5" fill="{{ $variant === 'white' ? '#4A151C' : '#C59B27' }}" />

    {{-- Civic Central Emblem: Pillar of Justice & Shield --}}
    <g transform="translate(12, 11)">
        {{-- Stylized Shield Contour --}}
        <path d="M20 2L4 7V19C4 28 11.5 35.5 20 38C28.5 35.5 36 28 36 19V7L20 2Z" fill="{{ $variant === 'white' ? '#FAF7F5' : '#350C12' }}" stroke="{{ $variant === 'white' ? '#4A151C' : '#C59B27' }}" stroke-width="1.5" stroke-linejoin="round" />
        
        {{-- Inner Shield Division --}}
        <path d="M20 3.5V36.5" stroke="{{ $variant === 'white' ? '#4A151C' : '#C59B27' }}" stroke-width="1" stroke-opacity="0.6" />
        <path d="M6 18H34" stroke="{{ $variant === 'white' ? '#4A151C' : '#C59B27' }}" stroke-width="1" stroke-opacity="0.6" stroke-dasharray="2 2" />

        {{-- Center Star of Civic Integrity --}}
        <polygon points="20,10 22,15 27,15 23,18 25,23 20,20 15,23 17,18 13,15 18,15" fill="{{ $variant === 'white' ? '#C59B27' : '#C59B27' }}" />

        {{-- Civic Scales of Balance at Base --}}
        <path d="M14 28C14 31 20 33 20 33C20 33 26 31 26 28" stroke="{{ $variant === 'white' ? '#4A151C' : '#FAF7F5' }}" stroke-width="1.5" stroke-linecap="round" />
        <line x1="20" y1="24" x2="20" y2="33" stroke="{{ $variant === 'white' ? '#4A151C' : '#FAF7F5' }}" stroke-width="1.5" />
    </g>
</svg>