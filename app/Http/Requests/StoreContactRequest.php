<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
{
    /**
     * Offer choices accepted by the contact form ("Conseil" = wants advice).
     *
     * @var list<string>
     */
    public const OFFERS = ['Silver', 'Golden', 'Diamond', 'Conseil'];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'phone' => ['required', 'string', 'regex:/^[0-9+().\s-]{8,30}$/'],
            'city' => ['required', 'string', Rule::in(['Marrakech', 'Casablanca'])],
            'offer' => ['nullable', 'string', Rule::in(self::OFFERS)],
            'message' => ['nullable', 'string', 'max:2000'],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Veuillez indiquer votre nom complet.',
            'name.min' => 'Le nom complet doit contenir au moins 2 caractères.',
            'name.max' => 'Le nom complet ne peut pas dépasser 100 caractères.',
            'phone.required' => 'Veuillez indiquer votre numéro de téléphone.',
            'phone.regex' => 'Veuillez indiquer un numéro de téléphone valide.',
            'city.required' => 'Veuillez choisir une ville.',
            'city.in' => 'La ville choisie doit être Marrakech ou Casablanca.',
            'offer.in' => 'Veuillez choisir une offre proposée.',
            'message.max' => 'Votre message ne peut pas dépasser 2 000 caractères.',
        ];
    }

    protected function getRedirectUrl(): string
    {
        return route('home').'#contact';
    }
}
