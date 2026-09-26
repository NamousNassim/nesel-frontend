@use('App\Support\Catalog')
@use('App\Support\Seo')
@use('App\Support\StructuredData')
@php
    $offers = Catalog::offers();
    $comparison = Catalog::comparison();

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
    <section class="bg-nesel-navy">
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-24">
            <x-breadcrumb :items="$breadcrumbs" class="mb-10" />
            <h1 class="max-w-3xl text-balance text-4xl font-black leading-[1] tracking-[-0.05em] text-white sm:text-5xl xl:text-6xl">
                Nos offres de domiciliation
            </h1>
            <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-300">
                Nesel propose trois niveaux de service, à Marrakech comme à Casablanca. Ils se distinguent par l’étendue de l’accompagnement administratif et de la représentation dont votre entreprise a besoin. Chaque offre fait l’objet d’une proposition personnalisée.
            </p>
        </div>
    </section>

    <section class="py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-6 px-5 sm:px-8 lg:grid-cols-3 lg:px-10">
            @foreach ($offers as $offer)
                <article id="offre-{{ strtolower($offer['name']) }}" @class([
                    'flex scroll-mt-24 flex-col border-t-4 bg-white p-7 shadow-[0_24px_80px_rgba(6,24,50,0.08)] sm:p-9',
                    'border-slate-400' => $offer['name'] === 'Silver',
                    'border-nesel-gold' => $offer['name'] === 'Golden',
                    'border-nesel-navy' => $offer['name'] === 'Diamond',
                ]) data-reveal>
                    <h2 class="text-3xl font-black tracking-[-0.04em]">{{ $offer['name'] }}</h2>
                    <p class="mt-2 text-sm font-bold text-nesel-red">{{ $offer['subtitle'] }}</p>
                    <p class="mt-4 text-sm leading-6 text-slate-600">{{ $offer['description'] }}</p>

                    <h3 class="mt-8 text-xs font-black uppercase tracking-[0.16em] text-slate-500">Inclus</h3>
                    <ul class="mt-4 space-y-3 text-sm leading-6">
                        @foreach ($offer['included'] as $item)
                            <li class="flex gap-3"><span class="text-nesel-red" aria-hidden="true">✓</span> {{ $item }}</li>
                        @endforeach
                    </ul>

                    <h3 class="mt-8 text-xs font-black uppercase tracking-[0.16em] text-slate-500">{{ $offer['optional_label'] }}</h3>
                    <ul class="mt-4 space-y-3 text-sm leading-6 text-slate-600">
                        @foreach ($offer['optional'] as $item)
                            <li class="flex gap-3"><span class="text-slate-400" aria-hidden="true">+</span> {{ $item }}</li>
                        @endforeach
                    </ul>

                    <div class="mt-auto pt-10">
                        <a href="{{ route('home', ['offre' => $offer['name']]) }}#contact" class="inline-flex min-h-13 w-full items-center justify-center gap-2 rounded-md bg-nesel-red px-7 text-sm font-bold text-white transition hover:bg-red-700">
                            Demander une proposition {{ $offer['name'] }}
                            <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section id="comparatif" class="scroll-mt-24 bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <p class="section-kicker">Comparatif</p>
            <h2 class="section-title mt-4">Comparer les offres Silver, Golden et Diamond</h2>
            <p class="mt-5 max-w-2xl text-base leading-7 text-slate-600">
                « En option » signifie que le service peut être ajouté à l’offre. Votre conseiller vous en précise les conditions.
            </p>

            <div class="mt-12 overflow-x-auto border border-slate-200">
                <table class="w-full min-w-[640px] border-collapse text-left text-sm">
                    <caption class="sr-only">Comparaison des services inclus dans les offres Silver, Golden et Diamond</caption>
                    <thead class="bg-nesel-navy text-white">
                        <tr>
                            <th scope="col" class="sticky left-0 bg-nesel-navy px-5 py-4 font-black">Service</th>
                            @foreach ($offers as $offer)
                                <th scope="col" class="px-5 py-4 font-black">{{ $offer['name'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach ($comparison as $row)
                            <tr class="bg-white even:bg-nesel-ivory">
                                <th scope="row" class="sticky left-0 bg-inherit px-5 py-4 font-bold text-nesel-navy">{{ $row['label'] }}</th>
                                @foreach ($row['cells'] as [$state, $detail])
                                    <td class="px-5 py-4 align-top">
                                        @if ($state === 'included')
                                            <span class="font-bold text-nesel-red" aria-hidden="true">✓</span>
                                            <span class="{{ $detail ? 'text-slate-700' : 'sr-only' }}">{{ $detail ?? 'Inclus' }}</span>
                                        @elseif ($state === 'optional')
                                            <span class="text-slate-500">En option</span>
                                        @else
                                            <span class="text-slate-300" aria-hidden="true">—</span>
                                            <span class="sr-only">Non inclus</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="mt-4 text-xs text-slate-500 sm:hidden">Faites défiler le tableau horizontalement pour voir toutes les offres.</p>
        </div>
    </section>

    <section class="bg-nesel-navy py-20 text-white sm:py-24">
        <div class="mx-auto flex max-w-7xl flex-col gap-8 px-5 sm:px-8 lg:flex-row lg:items-center lg:justify-between lg:px-10">
            <div>
                <h2 class="text-3xl font-black tracking-[-0.04em] sm:text-4xl">Vous hésitez entre deux offres ?</h2>
                <p class="mt-3 max-w-xl text-white/75">
                    Un conseiller vous aide à choisir selon votre activité et votre ville. Consultez aussi le détail de <a href="{{ route('services') }}" class="font-bold text-white underline underline-offset-4">nos services de domiciliation et d’accompagnement</a>.
                </p>
            </div>
            <a href="{{ route('home', ['offre' => 'Conseil']) }}#contact" class="inline-flex min-h-13 items-center justify-center gap-2 rounded-md bg-nesel-red px-7 text-sm font-bold text-white transition hover:bg-red-700">
                Être conseillé
                <span aria-hidden="true">→</span>
            </a>
        </div>
    </section>
@endsection
