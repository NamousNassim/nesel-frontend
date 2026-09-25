<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactRequestSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactRequestController extends Controller
{
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $contactRequest = $request->validated();

        Mail::to((string) config('services.contact.recipient'))->send(
            new ContactRequestSubmitted(
                name: $contactRequest['name'],
                phone: $contactRequest['phone'],
                city: $contactRequest['city'],
                details: $contactRequest['message'] ?? null,
            ),
        );

        return to_route('home')
            ->withFragment('contact')
            ->with('contact_success', 'Merci ! Votre demande a bien été envoyée. Un conseiller Nesel vous recontactera rapidement.');
    }
}
