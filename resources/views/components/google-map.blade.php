{{--
    Office location: visible address, a keyless Google Maps embed with a pin
    on the address, and an "Ouvrir dans Google Maps" link.
--}}
@props(['name', 'address', 'placeId' => null, 'title'])

@php
    $embedUrl = 'https://maps.google.com/maps?'.http_build_query([
        'q' => $address,
        'hl' => 'fr',
        'z' => 16,
        'output' => 'embed',
    ], encoding_type: PHP_QUERY_RFC3986);

    $externalUrl = 'https://www.google.com/maps/search/?'.http_build_query(array_filter([
        'api' => 1,
        'query' => $address,
        'query_place_id' => $placeId,
    ]), encoding_type: PHP_QUERY_RFC3986);
@endphp

<div {{ $attributes->merge(['class' => 'grid gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-14']) }}>
    <div>
        <p class="text-xs font-black uppercase tracking-[0.16em] text-slate-500">{{ $name }}</p>
        <address class="mt-3 border-l-4 border-nesel-red pl-5 text-lg font-bold not-italic leading-8 text-nesel-navy">{{ $address }}</address>
        <a href="{{ $externalUrl }}" target="_blank" rel="noopener noreferrer" class="mt-6 inline-flex items-center gap-2 border-b border-nesel-red pb-1 text-sm font-bold text-nesel-red transition hover:text-red-700">
            Ouvrir dans Google Maps
            <span aria-hidden="true">↗</span>
        </a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-[0_24px_80px_rgba(6,24,50,0.08)]">
        <iframe
            src="{{ $embedUrl }}"
            title="{{ $title }}"
            width="100%"
            height="420"
            style="border:0"
            class="block h-80 w-full sm:h-[420px]"
            loading="lazy"
            allowfullscreen
            referrerpolicy="strict-origin-when-cross-origin"
        ></iframe>
    </div>
</div>
