<?php

namespace Tests\Feature\Mail;

use App\Mail\ContactRequestSubmitted;
use Tests\TestCase;

class ContactRequestSubmittedTest extends TestCase
{
    public function test_email_renders_contact_details_in_html_and_plain_text(): void
    {
        $mail = new ContactRequestSubmitted(
            name: 'Nassim Namous',
            phone: '+212 6 12 34 56 78',
            city: 'Casablanca',
            details: 'Création d’entreprise',
        );

        $mail->assertHasSubject('Nouvelle demande de domiciliation — Casablanca')
            ->assertSeeInHtml('Nassim Namous')
            ->assertSeeInHtml('+212 6 12 34 56 78')
            ->assertSeeInHtml('Casablanca')
            ->assertSeeInHtml('Création d’entreprise')
            ->assertSeeInText('Nassim Namous')
            ->assertSeeInText('+212 6 12 34 56 78')
            ->assertSeeInText('Casablanca')
            ->assertSeeInText('Création d’entreprise');
    }

    public function test_email_escapes_user_provided_html(): void
    {
        $dangerousContent = '<script>alert("xss")</script>';
        $mail = new ContactRequestSubmitted(
            name: $dangerousContent,
            phone: '+212600000000',
            city: 'Marrakech',
            details: $dangerousContent,
        );

        $mail->assertSeeInHtml($dangerousContent)
            ->assertDontSeeInHtml($dangerousContent, false);
    }
}
