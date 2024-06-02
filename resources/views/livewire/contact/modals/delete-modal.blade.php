<div>
    <x-modal
        show="{{ $show }}"
        title="Supprimer le contact"
        content="
        <p>Etes-vous sûr de vouloir supprimer le contact ?</p>
        <p>Cette opération est irreversible.</p>
    "
    >
        <button
            wire:click="delete"
            type="button"
            class="w-full flex items-center gap-2 justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
        >
            <span wire:loading>
                <x-spinner />
            </span>
            <span>Confirmer</span>
        </button>
        <button
            wire:click="hide"
            type="button"
            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 hover:bg-white text-base font-medium text-gray-700  focus:outline-none  focus:border-custom-blue sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
        >
            Annuler
        </button>
    </x-modal>
</div>
