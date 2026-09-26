@use('App\Support\Catalog')
@use('App\Support\Seo')
@use('App\Support\StructuredData')
@php
    $offers = Catalog::offers();
    $comparison = Catalog::comparison();

    $offerPresentation = [
        'Silver' => ['positioning' => 'Essentiel', 'tone' => 'silver', 'guidance' => 'Pour démarrer simplement'],
        'Golden' => ['positioning' => 'Équilibre entre image et gestion', 'tone' => 'golden', 'guidance' => 'Pour déléguer davantage'],
        'Diamond' => ['positioning' => 'Premium', 'tone' => 'diamond', 'guidance' => 'Pour une gestion plus complète'],
    ];

    $breadcrumbs = [
        ['name' => 'Accueil', 'url' => Seo::route('home')],
        ['name' => 'Offres', 'url' => Seo::route('offers')],
    ];
@endphp

@extends('layouts.app', [
    'title' => 'Offres de domiciliation Silver, Golden et Diamond | Nesel',
    'description' => 'Comparez les offres de domiciliation Nesel Silver, Golden et Diamond à Marrakech et Casablanca et choisissez le niveau de services adapté à votre entreprise.',
])

@push('structured-data')
    <x-json-ld :data="StructuredData::offerCatalog($offers)" />
@endpush

@section('content')
    <section class="relative overflow-hidden bg-nesel-navy text-white">
        <div class="premium-grid absolute inset-0 opacity-35" aria-hidden="true"></div>
        <div class="absolute -right-36 -top-24 size-[38rem] rounded-full border border-white/10" aria-hidden="true"></div>
        <div class="absolute right-16 top-32 size-64 rounded-full border border-nesel-gold/20" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-24 xl:py-28">
            <x-breadcrumb :items="$breadcrumbs" class="mb-12" />

            <div class="grid gap-14 lg:grid-cols-[1.08fr_0.92fr] lg:items-end lg:gap-20">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.22em] text-nesel-gold">Choisir son niveau d’accompagnement</p>
                    <h1 class="mt-5 max-w-3xl text-balance text-4xl font-black leading-[0.98] tracking-[-0.055em] text-white sm:text-5xl xl:text-6xl">
                        Nos offres de domiciliation
                    </h1>
                    <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-300">
                        Nesel propose trois niveaux de service, à Marrakech comme à Casablanca. Ils se distinguent par l’étendue de l’accompagnement administratif et de la représentation dont votre entreprise a besoin. Chaque offre fait l’objet d’une proposition personnalisée.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="#offres" class="inline-flex min-h-13 items-center justify-center gap-2 rounded-md bg-nesel-red px-7 text-sm font-bold text-white transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-white">
                            Découvrir les offres
                            <span aria-hidden="true">↓</span>
                        </a>
                        <a href="#comparatif" class="inline-flex min-h-13 items-center justify-center gap-2 rounded-md border border-white/25 px-7 text-sm font-bold text-white transition hover:border-white/60 hover:bg-white/5 focus:outline-none focus:ring-2 focus:ring-white">
                            Accéder au comparatif
                            <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>

                <div class="border border-white/15 bg-white/[0.06] p-6 backdrop-blur-sm sm:p-8" aria-label="Les trois niveaux d’offres">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-white/45">Progression de service</p>
                    <div class="relative mt-7">
                        <div class="absolute bottom-5 left-5 top-5 hidden w-px bg-white/15 lg:block" aria-hidden="true"></div>
                        <ol class="grid gap-6 sm:grid-cols-3 lg:grid-cols-1">
                            @foreach ($offers as $offer)
                                <li class="relative flex items-center gap-5">
                                    <span @class([
                                        'z-10 flex size-10 shrink-0 items-center justify-center rounded-full border text-xs font-black',
                                        'border-white/25 bg-nesel-navy text-white/65' => $offer['name'] !== 'Golden',
                                        'border-nesel-gold bg-nesel-gold text-nesel-navy' => $offer['name'] === 'Golden',
                                    ])>{{ sprintf('%02d', $loop->iteration) }}</span>
                                    <span>
                                        <strong class="block text-lg tracking-tight">{{ $offer['name'] }}</strong>
                                        <span class="mt-1 block text-xs font-bold uppercase tracking-[0.14em] text-white/45">
                                            {{ $offer['name'] === 'Silver' ? 'Essentiel' : ($offer['name'] === 'Golden' ? 'Renforcé' : 'Premium') }}
                                        </span>
                                    </span>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="offres" class="scroll-mt-24 bg-nesel-ivory py-20 sm:py-28 lg:py-32">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="grid gap-8 lg:grid-cols-[0.78fr_1.22fr] lg:items-end lg:gap-20">
                <x-section-heading eyebrow="Trois niveaux, une même exigence" title="Choisissez l’accompagnement qui suit votre ambition." description="Aucun prix standard n’est affiché : chaque proposition est adaptée à votre ville, votre activité et au niveau de service recherché." />
                <p class="max-w-lg border-l border-slate-300 pl-6 text-sm leading-7 text-slate-500 lg:justify-self-end">Les services complémentaires restent lisibles sans alourdir la décision. Ouvrez la section correspondante sur chaque offre pour voir les options disponibles.</p>
            </div>

            <div class="mt-16 grid items-stretch gap-6 lg:grid-cols-3 lg:pt-4">
                @foreach ($offers as $offer)
                    @php($presentation = $offerPresentation[$offer['name']])
                    <x-offer-card
                        :offer="$offer"
                        :positioning="$presentation['positioning']"
                        :tone="$presentation['tone']"
                        :href="route('home', ['offre' => $offer['name']]).'#contact'"
                        id="offre-{{ strtolower($offer['name']) }}"
                        class="scroll-mt-24"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <section id="comparatif" class="scroll-mt-24 bg-white py-20 sm:py-28 lg:py-32">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:items-end lg:gap-20">
                <x-section-heading eyebrow="Comparatif" title="Comparer les offres Silver, Golden et Diamond" description="« En option » signifie que le service peut être ajouté à l’offre. Votre conseiller vous en précise les conditions." />
                <div class="flex flex-wrap gap-5 text-xs font-bold text-slate-600 lg:justify-end" aria-label="Légende du comparatif">
                    <span class="inline-flex items-center gap-2"><span class="flex size-6 items-center justify-center rounded-full bg-red-50 text-nesel-red" aria-hidden="true">✓</span> Inclus</span>
                    <span class="inline-flex items-center gap-2"><span class="flex size-6 items-center justify-center rounded-full bg-amber-50 text-[#8c6500]" aria-hidden="true">○</span> En option</span>
                    <span class="inline-flex items-center gap-2"><span class="flex size-6 items-center justify-center rounded-full bg-slate-100 text-slate-400" aria-hidden="true">—</span> Non inclus</span>
                </div>
            </div>

            <div class="mt-14 hidden border border-slate-200 shadow-[0_20px_70px_rgba(6,24,50,0.07)] lg:block">
                <table class="w-full border-collapse text-left text-sm">
                    <caption class="sr-only">Comparaison des services inclus dans les offres Silver, Golden et Diamond</caption>
                    <thead class="sticky top-20 z-20 bg-nesel-navy text-white">
                        <tr>
                            <th scope="col" class="w-[31%] px-6 py-5 text-xs font-black uppercase tracking-[0.16em] text-white/55">Service</th>
                            @foreach ($offers as $offer)
                                <th scope="col" @class([
                                    'border-l border-white/10 px-6 py-5',
                                    'bg-white/[0.06]' => $offer['name'] === 'Golden',
                                ])>
                                    <span class="block text-lg font-black">{{ $offer['name'] }}</span>
                                    <span class="mt-1 block text-[10px] font-bold uppercase tracking-[0.14em] text-white/45">{{ $offerPresentation[$offer['name']]['guidance'] }}</span>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach ($comparison as $row)
                            <tr class="odd:bg-white even:bg-nesel-ivory/70">
                                <th scope="row" class="px-6 py-5 font-bold leading-6 text-nesel-navy">{{ $row['label'] }}</th>
                                @foreach ($row['cells'] as [$state, $detail])
                                    <td @class([
                                        'border-l border-slate-200 px-6 py-5 align-top',
                                        'bg-amber-50/30' => $loop->iteration === 2,
                                    ])>
                                        @if ($state === 'included')
                                            <span class="inline-flex items-center gap-2 font-bold text-nesel-navy"><span class="flex size-6 shrink-0 items-center justify-center rounded-full bg-red-50 text-xs text-nesel-red" aria-hidden="true">✓</span>{{ $detail ?? 'Inclus' }}</span>
                                        @elseif ($state === 'optional')
                                            <span class="inline-flex items-center gap-2 font-semibold text-[#765500]"><span class="flex size-6 shrink-0 items-center justify-center rounded-full bg-amber-50" aria-hidden="true">○</span>En option</span>
                                        @else
                                            <span class="inline-flex items-center gap-2 text-slate-400"><span class="flex size-6 shrink-0 items-center justify-center rounded-full bg-slate-100" aria-hidden="true">—</span>Non inclus</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-12 space-y-4 lg:hidden" aria-label="Comparaison mobile des offres">
                @foreach ($offers as $offerIndex => $offer)
                    <details class="group overflow-hidden border border-slate-200 bg-white" @if ($offer['name'] === 'Golden') open @endif>
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-5 p-5 [&::-webkit-details-marker]:hidden sm:p-6">
                            <span>
                                <span class="block text-xl font-black tracking-tight text-nesel-navy">{{ $offer['name'] }}</span>
                                <span class="mt-1 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">{{ $offerPresentation[$offer['name']]['guidance'] }}</span>
                            </span>
                            <span class="flex size-9 items-center justify-center rounded-full border border-slate-200 text-lg text-nesel-red transition group-open:rotate-45" aria-hidden="true">+</span>
                        </summary>
                        <div class="border-t border-slate-200 px-5 sm:px-6">
                            @foreach ($comparison as $row)
                                @php([$state, $detail] = $row['cells'][$offerIndex])
                                <div class="flex items-start justify-between gap-5 border-b border-slate-100 py-4 last:border-b-0">
                                    <span class="max-w-[58%] text-sm font-semibold leading-6 text-nesel-navy">{{ $row['label'] }}</span>
                                    @if ($state === 'included')
                                        <span class="inline-flex max-w-[42%] items-start gap-2 text-right text-xs font-bold leading-5 text-nesel-navy"><span class="text-nesel-red" aria-hidden="true">✓</span>{{ $detail ?? 'Inclus' }}</span>
                                    @elseif ($state === 'optional')
                                        <span class="inline-flex items-center gap-2 text-xs font-semibold text-[#765500]"><span aria-hidden="true">○</span>En option</span>
                                    @else
                                        <span class="inline-flex items-center gap-2 text-xs text-slate-400"><span aria-hidden="true">—</span>Non inclus</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-nesel-ivory py-20 sm:py-28 lg:py-32">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <x-section-heading eyebrow="Aide à la décision" title="Quelle offre correspond à mon besoin ?" description="Ces repères vous aident à situer chaque niveau d’accompagnement. Un conseiller valide ensuite la solution avec vous selon votre activité." />

            <div class="mt-14 grid gap-px border border-slate-200 bg-slate-200 md:grid-cols-3">
                @foreach ($offers as $offer)
                    <article @class([
                        'relative bg-white p-7 sm:p-9',
                        'bg-[#fffdf7]' => $offer['name'] === 'Golden',
                        'bg-nesel-navy text-white' => $offer['name'] === 'Diamond',
                    ])>
                        <span @class([
                            'text-xs font-black uppercase tracking-[0.18em]',
                            'text-slate-400' => $offer['name'] === 'Silver',
                            'text-[#8c6500]' => $offer['name'] === 'Golden',
                            'text-nesel-gold' => $offer['name'] === 'Diamond',
                        ])>{{ sprintf('%02d', $loop->iteration) }}</span>
                        <h3 class="mt-8 text-3xl font-black tracking-[-0.04em]">{{ $offer['name'] }}</h3>
                        <p @class(['mt-3 text-lg font-bold', 'text-nesel-red' => $offer['name'] !== 'Diamond', 'text-white' => $offer['name'] === 'Diamond'])>{{ $offerPresentation[$offer['name']]['guidance'] }}</p>
                        <p @class(['mt-5 text-sm leading-6', 'text-slate-600' => $offer['name'] !== 'Diamond', 'text-white/60' => $offer['name'] === 'Diamond'])>{{ $offer['teaser'] }}</p>
                        <a href="#offre-{{ strtolower($offer['name']) }}" @class(['group mt-8 inline-flex items-center gap-2 text-sm font-bold', 'text-nesel-red' => $offer['name'] !== 'Diamond', 'text-white' => $offer['name'] === 'Diamond'])>Voir l’offre <span class="transition group-hover:translate-x-1" aria-hidden="true">→</span></a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-banner eyebrow="Un choix à confirmer" title="Parlons de votre entreprise" description="Expliquez-nous votre besoin et choisissez la solution de domiciliation la plus adaptée à votre activité.">
        <a href="{{ route('home', ['offre' => 'Conseil']) }}#contact" class="inline-flex min-h-13 items-center justify-center gap-2 rounded-md bg-nesel-red px-7 text-center text-sm font-bold text-white transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-white">Être rappelé</a>
        <a href="{{ route('domiciliation.marrakech') }}" class="inline-flex min-h-13 items-center justify-center gap-2 rounded-md border border-white/25 px-6 text-sm font-bold text-white transition hover:border-white/60 hover:bg-white/5 focus:outline-none focus:ring-2 focus:ring-white">Voir Marrakech</a>
        <a href="{{ route('domiciliation.casablanca') }}" class="inline-flex min-h-13 items-center justify-center gap-2 rounded-md border border-white/25 px-6 text-sm font-bold text-white transition hover:border-white/60 hover:bg-white/5 focus:outline-none focus:ring-2 focus:ring-white">Voir Casablanca</a>
        <a href="{{ route('services') }}" class="group inline-flex items-center justify-center gap-2 px-2 py-3 text-sm font-bold text-white">Nos services de domiciliation et d’accompagnement <span class="transition group-hover:translate-x-1" aria-hidden="true">→</span></a>
    </x-cta-banner>
@endsection
