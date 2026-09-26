@props(['name'])

<svg {{ $attributes->merge(['class' => 'size-7', 'viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.6', 'aria-hidden' => 'true']) }}>
    @switch($name)
        @case('building')
            <path d="M3 21h18M5 21V7l7-4 7 4v14M9 10h2m2 0h2m-6 4h2m2 0h2m-6 7v-3h6v3" stroke-linecap="round" stroke-linejoin="round" />
            @break
        @case('mail')
            <path d="m3 7 9 6 9-6M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke-linecap="round" stroke-linejoin="round" />
            @break
        @case('send')
            <path d="m21 3-8.5 18-2.6-7.9L2 10.5 21 3Zm-11.1 10.1L15 8" stroke-linecap="round" stroke-linejoin="round" />
            @break
        @case('workspace')
            <path d="M4 21v-8h16v8M7 13V5h10v8M9 9h6M8 17h2m4 0h2" stroke-linecap="round" stroke-linejoin="round" />
            @break
        @case('briefcase')
            <path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2m-12 4h18m-1-4H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2ZM10 11v2h4v-2" stroke-linecap="round" stroke-linejoin="round" />
            @break
        @case('documents')
            <path d="M8 4h8l3 3v13H8V4Zm8 0v4h4M5 7H3v13h12v-2M11 12h5m-5 4h5" stroke-linecap="round" stroke-linejoin="round" />
            @break
        @case('globe')
            <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0c2.1-2.46 3.2-5.46 3.2-9S14.1 5.46 12 3m0 18c-2.1-2.46-3.2-5.46-3.2-9S9.9 5.46 12 3M3.5 9h17m-17 6h17" stroke-linecap="round" stroke-linejoin="round" />
            @break
    @endswitch
</svg>
