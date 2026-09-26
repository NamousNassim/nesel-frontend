<?php

namespace App\Support;

class StructuredData
{
    /**
     * Site-wide Organization node built from config/business.php.
     *
     * @return array<string, mixed>
     */
    public static function organization(): array
    {
        return array_filter([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            '@id' => Seo::url('/#organization'),
            'name' => config('business.name'),
            'url' => Seo::route('home'),
            'logo' => Seo::url(config('business.logo')),
            'telephone' => config('business.telephone'),
            'email' => config('business.email'),
        ]);
    }

    /**
     * LocalBusiness node for a city, or null while its street address is unknown.
     *
     * @return array<string, mixed>|null
     */
    public static function localBusiness(string $city): ?array
    {
        $location = config("business.locations.{$city}");

        if (blank($location['street_address'] ?? null)) {
            return null;
        }

        return array_filter([
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => $location['name'],
            'url' => Seo::route($location['route']),
            'image' => Seo::url($location['image']),
            'logo' => Seo::url(config('business.logo')),
            'telephone' => $location['telephone'] ?? config('business.telephone'),
            'parentOrganization' => ['@id' => Seo::url('/#organization')],
            'address' => array_filter([
                '@type' => 'PostalAddress',
                'streetAddress' => $location['street_address'],
                'postalCode' => $location['postal_code'],
                'addressLocality' => $location['locality'],
                'addressCountry' => 'MA',
            ]),
        ]);
    }

    /**
     * @param  list<array{name: string, url: string}>  $items
     * @return array<string, mixed>
     */
    public static function breadcrumbs(array $items): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => array_map(fn (array $item, int $index): array => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'],
            ], $items, array_keys($items)),
        ];
    }

    /**
     * FAQPage node generated from the same data as the visible FAQ.
     *
     * Kept because it accurately describes visible content, but Google only
     * shows FAQ rich results for well-known government and health sites:
     * commercial sites like Nesel should not expect a rich result from it.
     *
     * @param  list<array{question: string, answer: string}>  $faqs
     * @return array<string, mixed>
     */
    public static function faqPage(array $faqs): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn (array $faq): array => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ], $faqs),
        ];
    }
}
