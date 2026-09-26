@props(['eyebrow' => 'Un projet à concrétiser', 'title', 'description'])

<section {{ $attributes->merge(['class' => 'relative overflow-hidden bg-nesel-navy text-white']) }}>
    <div class="premium-grid absolute inset-0 opacity-30" aria-hidden="true"></div>
    <div class="absolute -right-24 -top-24 size-80 rounded-full border border-white/10" aria-hidden="true"></div>
    <div class="absolute -bottom-48 right-16 size-96 rounded-full border border-nesel-red/30" aria-hidden="true"></div>

    <div class="relative mx-auto grid max-w-7xl gap-10 px-5 py-20 sm:px-8 sm:py-24 lg:grid-cols-[1fr_auto] lg:items-end lg:gap-16 lg:px-10">
        <div>
            <p class="text-xs font-black uppercase tracking-[0.2em] text-nesel-gold">{{ $eyebrow }}</p>
            <h2 class="mt-4 max-w-3xl text-balance text-4xl font-black leading-[1.02] tracking-[-0.045em] sm:text-5xl">{{ $title }}</h2>
            <p class="mt-6 max-w-2xl text-base leading-7 text-white/70 sm:text-lg sm:leading-8">{{ $description }}</p>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row lg:max-w-md lg:flex-wrap lg:justify-end">
            {{ $slot }}
        </div>
    </div>
</section>
