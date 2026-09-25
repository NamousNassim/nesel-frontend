<?php

namespace Tests\Feature\Http\Controllers;

use App\Mail\ContactRequestSubmitted;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactRequestControllerTest extends TestCase
{
    public function test_valid_request_sends_contact_email_and_confirms_submission(): void
    {
        config()->set('mail.from.address', 'contact@ne-sel.com');
        config()->set('mail.from.name', 'Nesel');
        config()->set('services.contact.recipient', 'majd.chraibi@gmail.com');
        Mail::fake();

        $response = $this->post(route('contact-requests.store'), [
            'name' => 'Nassim Namous',
            'phone' => '+212 6 12 34 56 78',
            'city' => 'Marrakech',
            'message' => 'Je souhaite domicilier une nouvelle société.',
        ]);

        $response->assertRedirect(route('home').'#contact')
            ->assertSessionHas('contact_success', 'Merci ! Votre demande a bien été envoyée. Un conseiller Nesel vous recontactera rapidement.');

        Mail::assertSent(ContactRequestSubmitted::class, function (ContactRequestSubmitted $mail): bool {
            return $mail->hasTo('majd.chraibi@gmail.com')
                && $mail->hasFrom('contact@ne-sel.com', 'Nesel')
                && $mail->name === 'Nassim Namous'
                && $mail->phone === '+212 6 12 34 56 78'
                && $mail->city === 'Marrakech'
                && $mail->details === 'Je souhaite domicilier une nouvelle société.';
        });
    }

    public function test_missing_required_fields_do_not_send_contact_email(): void
    {
        Mail::fake();

        $response = $this->from(route('home'))->post(route('contact-requests.store'));

        $response->assertRedirect(route('home').'#contact')
            ->assertSessionHasErrors([
                'name' => 'Veuillez indiquer votre nom complet.',
                'phone' => 'Veuillez indiquer votre numéro de téléphone.',
                'city' => 'Veuillez choisir une ville.',
            ]);

        Mail::assertNothingSent();
    }

    public function test_invalid_contact_details_do_not_send_contact_email(): void
    {
        Mail::fake();

        $response = $this->from(route('home'))->post(route('contact-requests.store'), [
            'name' => str_repeat('a', 101),
            'phone' => 'not-a-phone',
            'city' => 'Rabat',
            'message' => str_repeat('a', 2001),
        ]);

        $response->assertRedirect(route('home').'#contact')
            ->assertSessionHasErrors([
                'name' => 'Le nom complet ne peut pas dépasser 100 caractères.',
                'phone' => 'Veuillez indiquer un numéro de téléphone valide.',
                'city' => 'La ville choisie doit être Marrakech ou Casablanca.',
                'message' => 'Votre message ne peut pas dépasser 2 000 caractères.',
            ]);

        Mail::assertNothingSent();
    }
}
