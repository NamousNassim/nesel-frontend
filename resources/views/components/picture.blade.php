{{--
    Renders an image, and automatically serves a WebP/AVIF version when a file
    with the same name exists next to it in public/ (e.g. nesel-hero.webp).
--}}
@props(['src', 'alt', 'width', 'height'])

@php
    $basePath = preg_replace('/\.(png|jpe?g)$/i', '', $src);
    $sources = collect(['avif' => 'image/avif', 'webp' => 'image/webp'])
        ->filter(fn (string $type, string $extension): bool => $basePath !== $src && file_exists(public_path("{$basePath}.{$extension}")));
@endphp

<picture>
    @foreach ($sources as $extension => $type)
        <source srcset="{{ asset("{$basePath}.{$extension}") }}" type="{{ $type }}">
    @endforeach
    <img src="{{ asset($src) }}" alt="{{ $alt }}" width="{{ $width }}" height="{{ $height }}" {{ $attributes }}>
</picture>
