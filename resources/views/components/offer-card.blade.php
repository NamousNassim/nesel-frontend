@props(['offer', 'positioning', 'tone', 'href'])

<article {{ $attributes->class([
    'group relative flex h-full flex-col overflow-hidden border p-7 shadow-[0_18px_60px_rgba(6,24,50,0.08)] motion-safe:transition motion-safe:duration-300 hover:-translate-y-1 hover:shadow-[0_28px_80px_rgba(6,24,50,0.14)] sm:p-9',
    'border-slate-200 bg-white text-nesel-navy' => $tone === 'silver',
    'border-nesel-gold/70 bg-[#fffdf7] text-nesel-navy ring-1 ring-nesel-gold/20 lg:-translate-y-4 lg:hover:-translate-y-5' => $tone === 'golden',
    'border-nesel-navy bg-nesel-navy text-white' => $tone === 'diamond',
]) }}>
    <div @class([
        'absolute inset-x-0 top-0 h-1',
        'bg-slate-400' => $tone === 'silver',
        'bg-nesel-gold' => $tone === 'golden',
        'bg-nesel-red' => $tone === 'diamond',
    ]) aria-hidden="true"></div>

    <div class="flex items-start justify-between gap-5">
        <div>
            <p @class([
                'text-xs font-black uppercase tracking-[0.18em]',
                'text-slate-500' => $tone === 'silver',
                'text-[#8c6500]' => $tone === 'golden',
                'text-nesel-gold' => $tone === 'diamond',
            ])>{{ $positioning }}</p>
            <h3 class="mt-3 text-4xl font-black tracking-[-0.05em]">{{ $offer['name'] }}</h3>
        </div>
        <span @class([
            'flex size-11 shrink-0 items-center justify-center rounded-full border text-xs font-black',
            'border-slate-200 text-slate-500' => $tone === 'silver',
            'border-nesel-gold/60 bg-nesel-gold/10 text-[#8c6500]' => $tone === 'golden',
            'border-white/20 text-white/70' => $tone === 'diamond',
        ]) aria-hidden="true">{{ $tone === 'silver' ? '01' : ($tone === 'golden' ? '02' : '03') }}</span>
    </div>

    <p @class(['mt-5 text-sm font-bold leading-6', 'text-nesel-red' => $tone !== 'diamond', 'text-white' => $tone === 'diamond'])>{{ $offer['subtitle'] }}</p>
    <p @class(['mt-4 text-sm leading-6', 'text-slate-600' => $tone !== 'diamond', 'text-white/65' => $tone === 'diamond'])>{{ $offer['description'] }}</p>

    <div @class(['my-8 h-px', 'bg-slate-200' => $tone !== 'diamond', 'bg-white/15' => $tone === 'diamond'])></div>

    <h4 @class(['text-xs font-black uppercase tracking-[0.16em]', 'text-slate-500' => $tone !== 'diamond', 'text-white/50' => $tone === 'diamond'])>Inclus</h4>
    <ul class="mt-5 space-y-3 text-sm leading-6">
        @foreach ($offer['included'] as $item)
            <li class="flex gap-3">
                <span @class(['font-black', 'text-nesel-red' => $tone !== 'diamond', 'text-nesel-gold' => $tone === 'diamond']) aria-hidden="true">✓</span>
                <span>{{ $item }}</span>
            </li>
        @endforeach
    </ul>

    <details @class(['group/options mt-8 border-t pt-6', 'border-slate-200' => $tone !== 'diamond', 'border-white/15' => $tone === 'diamond'])>
        <summary @class(['flex cursor-pointer list-none items-center justify-between gap-4 text-xs font-black uppercase tracking-[0.14em] [&::-webkit-details-marker]:hidden', 'text-slate-500' => $tone !== 'diamond', 'text-white/60' => $tone === 'diamond'])>
            {{ $offer['optional_label'] }}
            <span class="text-lg font-normal motion-safe:transition group-open/options:rotate-45" aria-hidden="true">+</span>
        </summary>
        <ul @class(['mt-5 space-y-3 text-sm leading-6', 'text-slate-600' => $tone !== 'diamond', 'text-white/65' => $tone === 'diamond'])>
            @foreach ($offer['optional'] as $item)
                <li class="flex gap-3"><span aria-hidden="true">○</span><span>{{ $item }}</span></li>
            @endforeach
        </ul>
    </details>

    <div class="mt-auto pt-9">
        <a href="{{ $href }}" @class([
            'inline-flex min-h-13 w-full items-center justify-center gap-2 rounded-md px-6 text-center text-sm font-bold transition focus:outline-none focus:ring-2 focus:ring-offset-2',
            'bg-nesel-red text-white hover:bg-red-700 focus:ring-nesel-red' => $tone !== 'diamond',
            'bg-white text-nesel-navy hover:bg-nesel-gold focus:ring-white focus:ring-offset-nesel-navy' => $tone === 'diamond',
        ])>
            Demander une proposition {{ $offer['name'] }}
            <span class="motion-safe:transition group-hover:translate-x-1" aria-hidden="true">→</span>
        </a>
    </div>
</article>
