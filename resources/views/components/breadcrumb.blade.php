@props(['items'])

<nav aria-label="Fil d’Ariane" {{ $attributes }}>
    <ol class="flex flex-wrap items-center gap-2 text-xs font-bold uppercase tracking-[0.16em] text-white/60">
        @foreach ($items as $item)
            <li class="flex items-center gap-2">
                @if ($loop->last)
                    <span aria-current="page" class="text-white">{{ $item['name'] }}</span>
                @else
                    <a href="{{ $item['url'] }}" class="transition hover:text-white">{{ $item['name'] }}</a>
                    <span aria-hidden="true">/</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>

<x-json-ld :data="\App\Support\StructuredData::breadcrumbs($items)" />
