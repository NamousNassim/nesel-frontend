@props([
    'eyebrow',
    'title',
    'description' => null,
    'dark' => false,
])

<div {{ $attributes }}>
    <p @class([
        'text-xs font-black uppercase tracking-[0.2em]',
        'text-nesel-gold' => $dark,
        'text-nesel-red' => ! $dark,
    ])>{{ $eyebrow }}</p>
    <h2 @class([
        'mt-4 max-w-3xl text-balance text-4xl font-black leading-[1.02] tracking-[-0.045em] sm:text-5xl',
        'text-white' => $dark,
        'text-nesel-navy' => ! $dark,
    ])>{{ $title }}</h2>

    @if ($description)
        <p @class([
            'mt-6 max-w-2xl text-base leading-7 sm:text-lg sm:leading-8',
            'text-white/70' => $dark,
            'text-slate-600' => ! $dark,
        ])>{{ $description }}</p>
    @endif

    @isset($actions)
        <div class="mt-8 flex flex-wrap gap-4">
            {{ $actions }}
        </div>
    @endisset
</div>
