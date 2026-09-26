@props(['items'])

<div {{ $attributes->merge(['class' => 'divide-y divide-slate-300 border-y border-slate-300']) }}>
    @foreach ($items as $item)
        <details class="group py-6" @if ($loop->first) open @endif>
            <summary class="flex cursor-pointer list-none items-start justify-between gap-6 text-lg font-extrabold tracking-tight text-nesel-navy [&::-webkit-details-marker]:hidden">
                <h3>{{ $item['question'] }}</h3>
                <span class="mt-1 text-nesel-red transition group-open:rotate-45" aria-hidden="true">+</span>
            </summary>
            <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600">{{ $item['answer'] }}</p>
        </details>
    @endforeach
</div>
