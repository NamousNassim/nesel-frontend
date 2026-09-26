<?php

namespace App\Support;

/**
 * Nesel services and offers, as confirmed by the business document.
 *
 * Single source for the visible pages and their structured data, so both
 * always describe the same thing. No prices are defined: none are confirmed.
 */
class Catalog
{
    public const OFFER_NAMES = ['Silver', 'Golden', 'Diamond'];

    /**
     * @return list<array{id: string, title: string, summary: string, intro: string, items: list<string>, note: ?string}>
     */
    public static function services(): array
    {
        return [
            [
                'id' => 'domiciliation',
                'title' => 'Domiciliation du siège social au Maroc',
                'summary' => 'Une adresse professionnelle pour le siège social de votre entreprise, à Marrakech ou à Casablanca.',
                'intro' => 'Nesel met à votre disposition une adresse professionnelle à Marrakech ou à Casablanca, que vous pouvez utiliser comme siège social pour immatriculer votre société et effectuer vos formalités administratives.',
                'items' => [
                    'Adresse professionnelle pour votre siège social',
                    'Contrat de domiciliation',
                    'Attestation de domiciliation',
                    'Accompagnement dans les démarches administratives liées à votre domiciliation',
                ],
                'note' => null,
            ],
            [
                'id' => 'courrier',
                'title' => 'Gestion professionnelle de votre courrier',
                'summary' => 'Réception, suivi, notification, numérisation et archivage confidentiel de votre courrier.',
                'intro' => 'Votre courrier est pris en charge dès son arrivée. Si vous gérez votre société à distance ou êtes souvent en déplacement, vous savez ce qui vous est adressé sans avoir à passer à l’agence.',
                'items' => [
                    'Réception du courrier adressé à votre entreprise',
                    'Enregistrement et suivi de chaque pli',
                    'Notification à l’arrivée de votre courrier',
                    'Numérisation de vos documents',
                    'Archivage confidentiel',
                ],
                'note' => null,
            ],
            [
                'id' => 'reexpedition',
                'title' => 'Réexpédition nationale et internationale',
                'summary' => 'L’envoi de votre courrier et de vos documents au Maroc ou à l’étranger.',
                'intro' => 'Besoin de recevoir vos originaux ? Nous vous les réexpédions à l’adresse de votre choix, que vous soyez au Maroc ou à l’étranger.',
                'items' => [
                    'Envoi périodique de votre courrier',
                    'Envoi express sur demande',
                    'Transmission de documents sensibles',
                    'Expédition au Maroc et à l’international',
                ],
                'note' => 'Les modalités d’envoi sont précisées dans votre proposition.',
            ],
            [
                'id' => 'bureaux',
                'title' => 'Bureaux, coworking et salles de réunion',
                'summary' => 'Des espaces de travail pour vos rendez-vous, réunions et besoins ponctuels.',
                'intro' => 'Être domicilié ne vous empêche pas de recevoir. Nesel propose des espaces pour vos besoins ponctuels : rendez-vous clients, réunions d’équipe, assemblées ou journées de travail sur place.',
                'items' => [
                    'Bureaux privés équipés',
                    'Salles de réunion',
                    'Espaces de coworking',
                    'Accueil de vos visiteurs',
                ],
                'note' => 'Contactez-nous pour connaître les espaces disponibles dans votre ville.',
            ],
            [
                'id' => 'creation',
                'title' => 'Accompagnement à la création d’entreprise au Maroc',
                'summary' => 'De la forme juridique aux premières démarches fiscales, un accompagnement pas à pas.',
                'intro' => 'Créer une société passe par plusieurs étapes administratives. Nesel peut vous accompagner tout au long du parcours pour avancer avec méthode.',
                'items' => [
                    'Orientation sur le choix de la forme juridique',
                    'Préparation des statuts',
                    'Démarches liées au Registre de Commerce',
                    'Démarches liées à l’Identifiant Fiscal',
                    'Démarches liées à la Taxe Professionnelle',
                    'Premières démarches fiscales',
                ],
                'note' => null,
            ],
            [
                'id' => 'administratif',
                'title' => 'Secrétariat et accompagnement administratif',
                'summary' => 'Une assistance au quotidien pour vos tâches administratives et documentaires.',
                'intro' => 'Pour vous libérer des tâches administratives courantes, Nesel vous apporte une assistance au quotidien.',
                'items' => [
                    'Assistance administrative',
                    'Gestion documentaire',
                    'Accompagnement lors de démarches ou de contrôles administratifs',
                    'Orientation sur les questions fiscales et réglementaires',
                ],
                'note' => 'Cet accompagnement ne remplace pas le conseil d’un avocat ou d’un expert-comptable.',
            ],
            [
                'id' => 'investisseurs',
                'title' => 'Services complémentaires pour investisseurs et entrepreneurs',
                'summary' => 'Investisseurs étrangers, compte bancaire, structuration, transfert ou modification de siège.',
                'intro' => 'Vous investissez au Maroc depuis l’étranger ou votre société évolue ? Nesel vous accompagne dans les étapes clés.',
                'items' => [
                    'Assistance aux investisseurs étrangers',
                    'Accompagnement pour l’ouverture d’un compte bancaire professionnel',
                    'Conseil en structuration d’entreprise',
                    'Modification ou transfert de siège social',
                    'Formalités de changement statutaire',
                ],
                'note' => 'L’ouverture d’un compte bancaire reste soumise à la décision de la banque.',
            ],
        ];
    }

    /**
     * @return list<array{name: string, subtitle: string, teaser: string, description: string, included: list<string>, optional: list<string>, optional_label: string}>
     */
    public static function offers(): array
    {
        return [
            [
                'name' => 'Silver',
                'subtitle' => 'Domiciliation administrative essentielle',
                'teaser' => 'L’essentiel pour installer votre siège social et démarrer votre activité.',
                'description' => 'La solution de domiciliation fondamentale, pensée pour les entrepreneurs qui lancent leur activité.',
                'included' => [
                    'Adresse de siège social professionnelle',
                    'Contrat de domiciliation',
                    'Attestation de domiciliation',
                    'Réception du courrier',
                    'Notification par email',
                    'Mise à disposition du courrier en agence',
                    'Assistance à l’immatriculation',
                    'Accompagnement administratif standard',
                ],
                'optional' => [
                    'Réexpédition du courrier',
                    'Scan numérique du courrier',
                    'Location de salle de réunion',
                    'Permanence téléphonique',
                    'Assistance aux modifications statutaires',
                ],
                'optional_label' => 'Services complémentaires',
            ],
            [
                'name' => 'Golden',
                'subtitle' => 'Domiciliation exécutive et gestion administrative renforcée',
                'teaser' => 'Pour les entreprises qui souhaitent déléguer une plus grande part de leur gestion administrative.',
                'description' => 'Pensée pour les entreprises qui veulent déléguer une plus grande part de leur gestion administrative.',
                'included' => [
                    'Tous les services de l’offre Silver',
                    'Scan et transmission numérique du courrier important',
                    'Réexpédition mensuelle du courrier',
                    'Numéro professionnel dédié',
                    'Permanence téléphonique avec prise de messages',
                    'Accès aux salles de réunion (quota mensuel selon les conditions de l’offre)',
                    'Assistance aux modifications statutaires',
                    'Assistance aux formalités administratives',
                    'Support prioritaire',
                ],
                'optional' => [
                    'Standard personnalisé au nom de votre société',
                    'Réexpédition illimitée',
                    'Gestion administrative externalisée',
                    'Assistance fiscale étendue',
                    'Interlocuteur dédié',
                ],
                'optional_label' => 'Services complémentaires',
            ],
            [
                'name' => 'Diamond',
                'subtitle' => 'Domiciliation Corporate Premium et représentation complète',
                'teaser' => 'Notre niveau de service le plus complet, avec un interlocuteur dédié en permanence.',
                'description' => 'Le niveau de service le plus complet de Nesel, pour les entreprises qui veulent confier l’essentiel de leur gestion administrative.',
                'included' => [
                    'Tous les services de l’offre Golden',
                    'Réexpédition illimitée et prioritaire du courrier',
                    'Standard personnalisé au nom de votre société',
                    'Numéro dédié exclusif',
                    'Accueil physique de vos partenaires et clients',
                    'Accès prioritaire étendu aux salles de réunion',
                    'Accompagnement complet à la création d’entreprise',
                    'Gestion des modifications juridiques et statutaires',
                    'Coordination avec un expert-comptable partenaire',
                    'Assistance lors des contrôles fiscaux',
                    'Gestion administrative externalisée',
                    'Interlocuteur dédié permanent',
                ],
                'optional' => [
                    'Représentation administrative',
                    'Accompagnement bancaire',
                    'Assistance aux procédures d’appels d’offres publics et privés',
                    'Secrétariat externalisé',
                    'Gestion des formalités annuelles',
                ],
                'optional_label' => 'Services premium complémentaires',
            ],
        ];
    }

    /**
     * Comparison rows. Each cell is [state, detail]: state is "included",
     * "optional" or "none"; detail is an optional precision for the cell.
     *
     * @return list<array{label: string, cells: array{0: array{string, ?string}, 1: array{string, ?string}, 2: array{string, ?string}}}>
     */
    public static function comparison(): array
    {
        $included = fn (?string $detail = null): array => ['included', $detail];
        $optional = ['optional', null];
        $none = ['none', null];

        return [
            ['label' => 'Adresse professionnelle', 'cells' => [$included(), $included(), $included()]],
            ['label' => 'Contrat de domiciliation', 'cells' => [$included(), $included(), $included()]],
            ['label' => 'Attestation de domiciliation', 'cells' => [$included(), $included(), $included()]],
            ['label' => 'Réception du courrier', 'cells' => [$included(), $included(), $included()]],
            ['label' => 'Notification', 'cells' => [$included('Par email'), $included(), $included()]],
            ['label' => 'Scan du courrier', 'cells' => [$optional, $included('Courrier important'), $included()]],
            ['label' => 'Réexpédition', 'cells' => [$optional, $included('Mensuelle'), $included('Illimitée et prioritaire')]],
            ['label' => 'Numéro professionnel', 'cells' => [$none, $included('Dédié'), $included('Dédié exclusif')]],
            ['label' => 'Standard personnalisé', 'cells' => [$none, $optional, $included()]],
            ['label' => 'Permanence téléphonique', 'cells' => [$optional, $included('Avec prise de messages'), $included()]],
            ['label' => 'Salle de réunion', 'cells' => [$optional, $included('Quota mensuel selon les conditions de l’offre'), $included('Accès prioritaire étendu')]],
            ['label' => 'Modifications statutaires', 'cells' => [$optional, $included('Assistance'), $included('Gestion')]],
            ['label' => 'Support prioritaire', 'cells' => [$none, $included(), $included()]],
            ['label' => 'Interlocuteur dédié', 'cells' => [$none, $optional, $included('Permanent')]],
            ['label' => 'Gestion administrative externalisée', 'cells' => [$none, $optional, $included()]],
            ['label' => 'Accueil des clients', 'cells' => [$none, $none, $included()]],
            ['label' => 'Création d’entreprise', 'cells' => [$included('Assistance à l’immatriculation'), $included('Assistance à l’immatriculation'), $included('Accompagnement complet')]],
        ];
    }
}
