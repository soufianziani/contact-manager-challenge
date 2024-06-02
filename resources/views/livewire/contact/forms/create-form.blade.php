@extends('livewire.contact.forms.form')

@section('title')
    {{ __('Ajouter Contact') }}
@endsection

@section('modals')
    @if ($showDuplicateContactModal)
        <div>
            <x-modal
                show="{{ $showDuplicateContactModal }}"
                title="Contact dupliqué"
                content="
                    <p>Un contact avec le même prénom et nom existe déjà.</p>
                "
            >
                <button
                    wire:click="confirmDuplicateContact"
                    type="button"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                >
                    Confirmer
                </button>
                <button
                    wire:click="closeDuplicateContactModal"
                    type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                >
                    Annuler
                </button>
            </x-modal>
        </div>
    @endif
@endsection

