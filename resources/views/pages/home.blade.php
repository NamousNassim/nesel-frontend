@extends('layouts.app', [
    'title' => 'Domiciliation d’entreprise au Maroc | Marrakech & Casablanca | Nesel',
    'description' => 'Nesel domicilie votre entreprise à Marrakech ou à Casablanca : adresse professionnelle pour votre siège social, gestion du courrier et accompagnement par une équipe locale.',
])

@section('content')
    <section id="accueil" class="relative overflow-hidden bg-nesel-navy">
        <div class="mx-auto grid min-h-[calc(100svh-5rem)] max-w-[1600px] lg:grid-cols-[0.88fr_1.12fr]">
            <div class="relative z-10 flex items-center px-5 py-20 sm:px-10 lg:px-16 lg:py-24 xl:px-24">
                <div class="max-w-xl" data-reveal>
                    <h1 class="mb-8 flex items-center gap-3 text-sm font-black uppercase tracking-[0.18em] text-white/80">
                        <span class="h-px w-9 shrink-0 bg-nesel-red" aria-hidden="true"></span>
                        Domiciliation d’entreprise à Marrakech et Casablanca
                    </h1>
                    <p class="text-balance text-5xl font-black leading-[0.95] tracking-[-0.055em] text-white sm:text-6xl xl:text-7xl">
                        Votre entreprise mérite une <span class="text-nesel-red">adresse qui compte.</span>
                    </p>
                    <p class="mt-7 max-w-lg text-lg leading-8 text-slate-300">
                        Domiciliez votre société dans deux villes stratégiques du Maroc. Une adresse professionnelle, un courrier bien géré et une équipe vraiment disponible.
                    </p>
                    <div class="mt-10 flex flex-col gap-3 sm:flex-row">
                        <a href="#contact" class="inline-flex min-h-13 items-center justify-center gap-2 rounded-md bg-nesel-red px-7 text-sm font-bold text-white transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-white">
                            Demander une proposition
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m5 12 14 0m-5-5 5 5-5 5" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </a>
                        <a href="#services" class="inline-flex min-h-13 items-center justify-center rounded-md border border-white/30 px-7 text-sm font-bold text-white transition hover:border-white hover:bg-white/10">Découvrir nos services</a>
                    </div>
                    <div class="mt-12 flex items-center gap-8 border-t border-white/15 pt-7 text-sm text-slate-300">
                        <p><strong class="block text-2xl text-white">2</strong> adresses premium</p>
                        <span class="h-10 w-px bg-white/15"></span>
                        <p><strong class="block text-2xl text-white">100%</strong> suivi humain</p>
                    </div>
                </div>
            </div>

            <div class="relative min-h-[520px] overflow-hidden lg:min-h-full">
                <x-picture src="nesel-hero.png" alt="Espace de travail contemporain inspiré de Marrakech et Casablanca" class="absolute inset-0 size-full object-cover" width="1680" height="945" fetchpriority="high" />
                <div class="absolute inset-0 bg-nesel-navy/10" aria-hidden="true"></div>
                <div class="absolute bottom-6 left-5 right-5 border-l-4 border-nesel-red bg-white p-5 shadow-2xl sm:bottom-10 sm:left-10 sm:right-auto sm:max-w-xs">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-nesel-red">Simple & rapide</p>
                    <p class="mt-2 text-lg font-extrabold leading-snug text-nesel-navy">Votre domiciliation peut commencer dès que votre dossier est validé.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-nesel-red text-white">
        <div class="mx-auto grid max-w-7xl gap-4 px-5 py-5 text-sm font-bold sm:grid-cols-3 sm:px-8 lg:px-10">
            <p class="flex items-center gap-3"><span class="text-nesel-gold">✓</span> Adresse professionnelle</p>
            <p class="flex items-center gap-3"><span class="text-nesel-gold">✓</span> Réception de courrier</p>
            <p class="flex items-center gap-3"><span class="text-nesel-gold">✓</span> Accompagnement administratif</p>
        </div>
    </div>

    <section id="services" class="scroll-mt-24 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20">
                <div data-reveal>
                    <p class="section-kicker">Votre quotidien, simplifié</p>
                    <h2 class="section-title mt-4">Bien plus qu’une adresse.</h2>
                    <p class="mt-6 max-w-md text-base leading-7 text-slate-600">Nesel prend en charge l’essentiel pour vous laisser avancer sur ce qui compte : votre activité.</p>
                    <a href="{{ route('services') }}" class="mt-8 inline-flex items-center gap-2 border-b border-nesel-red pb-1 text-sm font-bold text-nesel-red transition hover:text-red-700">
                        Découvrir tous nos services
                        <span aria-hidden="true">→</span>
                    </a>
                </div>

                <div class="grid border-t border-slate-300 sm:grid-cols-2" data-reveal>
                    <article class="service-item sm:border-r sm:border-slate-300">
                        <span class="service-number">01</span>
                        <svg class="size-8 text-nesel-red" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 10h2m2 0h2m-6 4h2m2 0h2m-6 7v-3h6v3" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        <h3>Une adresse crédible</h3>
                        <p>Installez le siège de votre entreprise dans un environnement professionnel à Marrakech ou Casablanca.</p>
                    </article>
                    <article class="service-item">
                        <span class="service-number">02</span>
                        <svg class="size-8 text-nesel-red" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="m3 7 9 6 9-6M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        <h3>Votre courrier suivi</h3>
                        <p>Nous réceptionnons vos plis et vous tenons informé pour que rien d’important ne vous échappe.</p>
                    </article>
                    <article class="service-item border-b-0 sm:border-r sm:border-slate-300">
                        <span class="service-number">03</span>
                        <svg class="size-8 text-nesel-red" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M8 12h8m-8 4h5M9 3h6l4 4v14H5V3h4Zm5 0v5h5" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        <h3>Des démarches plus claires</h3>
                        <p>Une équipe locale vous guide dans les étapes administratives liées à votre domiciliation.</p>
                    </article>
                    <article class="service-item border-b-0">
                        <span class="service-number">04</span>
                        <svg class="size-8 text-nesel-red" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M8 10h.01M12 10h.01M16 10h.01M21 11.5a8.5 8.5 0 1 1-3.1-6.56M21 4v6h-6" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        <h3>Une équipe accessible</h3>
                        <p>Des réponses rapides, un interlocuteur identifiable et une relation sans jargon inutile.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section id="villes" class="scroll-mt-24 bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-end" data-reveal>
                <div>
                    <p class="section-kicker">Deux villes, la même exigence</p>
                    <h2 class="section-title mt-4">Choisissez votre point d’ancrage.</h2>
                </div>
                <p class="max-w-sm text-sm leading-6 text-slate-500">Votre choix dépend de votre marché, de vos partenaires et de l’image que vous souhaitez donner à votre activité.</p>
            </div>

            <div class="mt-14 grid gap-px overflow-hidden border border-slate-200 bg-slate-200 lg:grid-cols-2" data-reveal>
                <article class="group relative min-h-[430px] overflow-hidden bg-[#9f432f] p-8 text-white sm:p-12">
                    <x-picture :src="config('business.locations.marrakech.image')" alt="" class="absolute inset-0 size-full object-cover object-left transition duration-700 group-hover:scale-105" width="1680" height="945" loading="lazy" />
                    <div class="absolute inset-0 bg-[#601b16]/70" aria-hidden="true"></div>
                    <div class="relative flex h-full flex-col justify-between">
                        <span class="text-xs font-black uppercase tracking-[0.22em] text-white/70">01 · Ville ocre</span>
                        <div>
                            <h3 class="text-4xl font-black tracking-[-0.04em] sm:text-5xl"><a href="{{ route('domiciliation.marrakech') }}" class="hover:underline">Marrakech</a></h3>
                            <p class="mt-4 max-w-md leading-7 text-white/80">Une implantation distinctive au cœur d’un écosystème entrepreneurial, touristique et international en plein mouvement.</p>
                            <div class="mt-7 flex flex-wrap items-center gap-x-8 gap-y-4">
                                <a href="{{ route('domiciliation.marrakech') }}" class="inline-flex items-center gap-2 border-b border-white pb-1 text-sm font-bold">Domiciliation à Marrakech <span aria-hidden="true">→</span></a>
                                <button type="button" class="city-choice inline-flex items-center gap-2 border-b border-white/50 pb-1 text-sm font-bold text-white/80 hover:text-white" data-city="Marrakech">Être rappelé pour Marrakech</button>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="group relative min-h-[430px] overflow-hidden bg-nesel-navy p-8 text-white sm:p-12">
                    <x-picture :src="config('business.locations.casablanca.image')" alt="" class="absolute inset-0 size-full object-cover object-right transition duration-700 group-hover:scale-105" width="1680" height="945" loading="lazy" />
                    <div class="absolute inset-0 bg-nesel-navy/75" aria-hidden="true"></div>
                    <div class="relative flex h-full flex-col justify-between">
                        <span class="text-xs font-black uppercase tracking-[0.22em] text-white/70">02 · Capitale économique</span>
                        <div>
                            <h3 class="text-4xl font-black tracking-[-0.04em] sm:text-5xl"><a href="{{ route('domiciliation.casablanca') }}" class="hover:underline">Casablanca</a></h3>
                            <p class="mt-4 max-w-md leading-7 text-white/80">Une adresse au plus près du principal centre d’affaires du Maroc, pensée pour les entreprises ambitieuses.</p>
                            <div class="mt-7 flex flex-wrap items-center gap-x-8 gap-y-4">
                                <a href="{{ route('domiciliation.casablanca') }}" class="inline-flex items-center gap-2 border-b border-white pb-1 text-sm font-bold">Domiciliation à Casablanca <span aria-hidden="true">→</span></a>
                                <button type="button" class="city-choice inline-flex items-center gap-2 border-b border-white/50 pb-1 text-sm font-bold text-white/80 hover:text-white" data-city="Casablanca">Être rappelé pour Casablanca</button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section id="offres" class="scroll-mt-24 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-end" data-reveal>
                <div>
                    <p class="section-kicker">Nos offres</p>
                    <h2 class="section-title mt-4">Trois niveaux de service, selon vos besoins.</h2>
                </div>
                <a href="{{ route('offers') }}" class="inline-flex items-center gap-2 border-b border-nesel-red pb-1 text-sm font-bold text-nesel-red transition hover:text-red-700">
                    Comparer les offres
                    <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="mt-14 grid gap-px border border-slate-300 bg-slate-300 md:grid-cols-3" data-reveal>
                @foreach (\App\Support\Catalog::offers() as $offer)
                    <article class="bg-nesel-ivory p-7 sm:p-9">
                        <h3 class="text-2xl font-black tracking-[-0.04em]">{{ $offer['name'] }}</h3>
                        <p class="mt-1 text-sm font-bold text-nesel-red">{{ $offer['subtitle'] }}</p>
                        <p class="mt-4 text-sm leading-6 text-slate-600">{{ $offer['teaser'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="demarche" class="scroll-mt-24 bg-nesel-navy py-24 text-white sm:py-32">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="grid gap-14 lg:grid-cols-[0.8fr_1.2fr] lg:gap-24">
                <div data-reveal>
                    <p class="section-kicker text-nesel-gold">La démarche</p>
                    <h2 class="section-title mt-4 text-white">Simple, du premier échange à votre installation.</h2>
                </div>
                <ol class="divide-y divide-white/15 border-y border-white/15" data-reveal>
                    <li class="step-row">
                        <span>01</span>
                        <div><h3>Parlons de votre projet</h3><p>Vous nous indiquez votre activité, votre ville et vos besoins.</p></div>
                    </li>
                    <li class="step-row">
                        <span>02</span>
                        <div><h3>Recevez votre proposition</h3><p>Nous vous orientons vers la formule adaptée, sans frais cachés.</p></div>
                    </li>
                    <li class="step-row">
                        <span>03</span>
                        <div><h3>Activez votre adresse</h3><p>Après validation du dossier, votre domiciliation est mise en place.</p></div>
                    </li>
                </ol>
            </div>
        </div>
    </section>

    <section id="contact" class="scroll-mt-20 py-24 sm:py-32">
        <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.85fr_1.15fr] lg:gap-20 lg:px-10">
            <div data-reveal>
                <p class="section-kicker">Prêt à avancer ?</p>
                <h2 class="section-title mt-4">Commençons par une conversation.</h2>
                <p class="mt-6 max-w-md text-base leading-7 text-slate-600">Laissez-nous vos coordonnées. Un conseiller Nesel vous recontactera pour comprendre votre besoin de domiciliation.</p>
                <div class="mt-10 border-l-4 border-nesel-red pl-5">
                    <p class="font-bold text-nesel-navy">Marrakech ou Casablanca</p>
                    <p class="mt-1 text-sm text-slate-500">Une réponse claire, adaptée à votre projet.</p>
                </div>
            </div>

            <form id="callback-form" method="POST" action="{{ route('contact-requests.store') }}" class="bg-white p-6 shadow-[0_24px_80px_rgba(6,24,50,0.12)] sm:p-10" data-reveal>
                @csrf

                @if ($errors->any())
                    <div class="mb-6 border-l-4 border-nesel-red bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
                        Veuillez corriger les informations indiquées ci-dessous.
                    </div>
                @endif

                <div class="grid gap-6 sm:grid-cols-2">
                    <label class="field-label sm:col-span-2">
                        Nom complet
                        <input type="text" name="name" value="{{ old('name') }}" required maxlength="100" autocomplete="name" placeholder="Votre nom" class="field-input @error('name') border-nesel-red @enderror" aria-describedby="name-error">
                        @error('name')
                            <span id="name-error" class="normal-case tracking-normal text-red-700">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="field-label">
                        Téléphone
                        <input type="tel" name="phone" value="{{ old('phone') }}" required maxlength="30" autocomplete="tel" placeholder="+212 6 00 00 00 00" class="field-input @error('phone') border-nesel-red @enderror" aria-describedby="phone-error">
                        @error('phone')
                            <span id="phone-error" class="normal-case tracking-normal text-red-700">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="field-label">
                        Ville souhaitée
                        <select id="city-select" name="city" required class="field-input @error('city') border-nesel-red @enderror" aria-describedby="city-error">
                            <option value="">Sélectionner</option>
                            <option value="Marrakech" @selected(old('city', request()->query('ville')) === 'Marrakech')>Marrakech</option>
                            <option value="Casablanca" @selected(old('city', request()->query('ville')) === 'Casablanca')>Casablanca</option>
                        </select>
                        @error('city')
                            <span id="city-error" class="normal-case tracking-normal text-red-700">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="field-label sm:col-span-2">
                        Offre souhaitée <span class="font-semibold normal-case tracking-normal text-slate-400">(facultatif)</span>
                        <select name="offer" class="field-input @error('offer') border-nesel-red @enderror" aria-describedby="offer-error">
                            <option value="">Pas de préférence</option>
                            @foreach (['Silver' => 'Silver', 'Golden' => 'Golden', 'Diamond' => 'Diamond', 'Conseil' => 'Je souhaite être conseillé'] as $offerValue => $offerLabel)
                                <option value="{{ $offerValue }}" @selected(old('offer', request()->query('offre')) === $offerValue)>{{ $offerLabel }}</option>
                            @endforeach
                        </select>
                        @error('offer')
                            <span id="offer-error" class="normal-case tracking-normal text-red-700">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="field-label sm:col-span-2">
                        Votre besoin
                        <textarea name="message" rows="3" maxlength="2000" placeholder="Création d’entreprise, transfert de siège…" class="field-input resize-none @error('message') border-nesel-red @enderror" aria-describedby="message-error">{{ old('message') }}</textarea>
                        @error('message')
                            <span id="message-error" class="normal-case tracking-normal text-red-700">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <button type="submit" class="mt-7 inline-flex min-h-13 w-full items-center justify-center gap-2 rounded-md bg-nesel-red px-7 text-sm font-bold text-white transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-nesel-red focus:ring-offset-2">
                    Demander à être rappelé
                    <span aria-hidden="true">→</span>
                </button>
                <p class="mt-4 text-center text-xs leading-5 text-slate-400">En envoyant ce formulaire, vous acceptez d’être contacté par l’équipe Nesel.</p>
            </form>
        </div>
    </section>
@endsection
