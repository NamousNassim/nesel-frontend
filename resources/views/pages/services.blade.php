@use('App\Support\Catalog')
@use('App\Support\Seo')
@use('App\Support\StructuredData')
@php
    $services = Catalog::services();

    $breadcrumbs = [
        ['name' => 'Accueil', 'url' => Seo::route('home')],
        ['name' => 'Services', 'url' => Seo::route('services')],
    ];
@endphp

@extends('layouts.app', [
    'title' => 'Services de domiciliation et accompagnement d’entreprise | Nesel',
    'description' => 'Découvrez les services Nesel : domiciliation d’entreprise, gestion du courrier, bureaux, création d’entreprise et accompagnement administratif à Marrakech et Casablanca.',
])

@push('structured-data')
    <x-json-ld :data="StructuredData::services($services)" />
@endpush

@section('content')
    <section class="bg-nesel-navy">
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-24">
            <x-breadcrumb :items="$breadcrumbs" class="mb-10" />
            <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:gap-20">
                <div>
                    <h1 class="text-balance text-4xl font-black leading-[1] tracking-[-0.05em] text-white sm:text-5xl xl:text-6xl">
                        Services de domiciliation et d’accompagnement pour votre entreprise
                    </h1>
                    <p class="mt-7 max-w-xl text-lg leading-8 text-slate-300">
                        Adresse de siège social, gestion du courrier, espaces de travail, création de société et suivi administratif : Nesel réunit les services dont votre entreprise a besoin à Marrakech et à Casablanca.
                    </p>
                </div>
                <nav aria-label="Nos services" class="self-end">
                    <ol class="divide-y divide-white/15 border-y border-white/15">
                        @foreach ($services as $service)
                            <li>
                                <a href="#{{ $service['id'] }}" class="flex items-center gap-4 py-3 text-sm font-bold text-white/80 transition hover:text-white">
                                    <span class="w-6 text-xs text-nesel-red">{{ sprintf('%02d', $loop->iteration) }}</span>
                                    {{ $service['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    @foreach ($services as $service)
        <section id="{{ $service['id'] }}" @class(['scroll-mt-24 py-20 sm:py-24', 'bg-white' => $loop->even])>
            <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[0.9fr_1.1fr] lg:gap-20 lg:px-10" data-reveal>
                <div>
                    <p class="section-kicker">{{ sprintf('%02d', $loop->iteration) }}</p>
                    <h2 class="section-title mt-4">{{ $service['title'] }}</h2>
                    <p class="mt-6 max-w-lg text-base leading-7 text-slate-600">{{ $service['intro'] }}</p>

                    @if ($service['id'] === 'domiciliation')
                        <p class="mt-6 max-w-lg text-base leading-7 text-slate-600">
                            En savoir plus sur la <a href="{{ route('domiciliation.marrakech') }}" class="font-semibold text-nesel-red underline underline-offset-4">domiciliation à Marrakech</a>
                            ou la <a href="{{ route('domiciliation.casablanca') }}" class="font-semibold text-nesel-red underline underline-offset-4">domiciliation à Casablanca</a>.
                        </p>
                    @endif
                </div>

                <div>
                    <ul class="divide-y divide-slate-300 border-y border-slate-300">
                        @foreach ($service['items'] as $item)
                            <li class="flex gap-4 py-4 text-base font-semibold text-nesel-navy">
                                <span class="text-nesel-red" aria-hidden="true">✓</span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>

                    @if ($service['note'])
                        <p class="mt-5 text-sm leading-6 text-slate-500">{{ $service['note'] }}</p>
                    @endif
                </div>
            </div>
        </section>
    @endforeach

    <section class="bg-nesel-navy py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-end lg:gap-20">
                <div>
                    <h2 class="section-title text-white">Besoin d’une solution adaptée à votre entreprise ?</h2>
                    <p class="mt-5 max-w-xl text-white/75">
                        Dites-nous où vous souhaitez vous installer : un conseiller vous rappelle pour construire avec vous la formule qui correspond à votre activité.
                    </p>
                    <a href="{{ route('offers') }}" class="mt-6 inline-flex items-center gap-2 border-b border-white pb-1 text-sm font-bold">
                        Découvrir nos offres de domiciliation
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row lg:justify-end">
                    <a href="{{ route('home', ['ville' => 'Marrakech']) }}#contact" class="inline-flex min-h-13 items-center justify-center gap-2 rounded-md bg-nesel-red px-7 text-sm font-bold text-white transition hover:bg-red-700">
                        Être rappelé pour Marrakech
                    </a>
                    <a href="{{ route('home', ['ville' => 'Casablanca']) }}#contact" class="inline-flex min-h-13 items-center justify-center gap-2 rounded-md bg-nesel-red px-7 text-sm font-bold text-white transition hover:bg-red-700">
                        Être rappelé pour Casablanca
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
