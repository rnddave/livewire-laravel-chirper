<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
    
    #[Validate('required|string|max:255')]
    public string $message = '';

    public function store(): void
    {
        $validated = $this->validate(); 

        auth()->user()->chirps()->create($validated);

        $this->message = '';

        $this->dispatch('chirp-created');
    }
}; ?>

{{-- Using Livewire's Validate attribute, we're leveraging Laravel's powerful validation features to ensure that the user provides a message that doesn't exceed the 255 character limit of the database column we'll be creating.

We're then creating a record that will belong to the logged in user by utilizing a chirps relationship. We will define that relationship soon.

Finally, we are also clearing the message form field value. --}}

<div>
    <form wire:submit="store"> 
        <textarea
            wire:model="message"
            placeholder="{{ __('What\'s on your mind?') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
 
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
    </form> 
</div>
