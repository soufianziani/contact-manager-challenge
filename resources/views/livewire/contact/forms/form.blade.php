<div>
    @if ($show)
        <div
            id="modal"
            class="fixed inset-0  duration-1000 flex items-center justify-center z-50 transition-opacity  ease-in-out bg-black bg-opacity-50"
        >
            <form
                wire:submit.prevent="save"
                class="bg-white rounded-lg shadow-lg w-1/2"
            >
                <div class="p-5">
                    <h2 class="text-2xl mb-4">
                        @yield('title')
                    </h2>
                    <div class="flex flex-col gap-y-5">
                        <div class="flex flex-col gap-y-5">
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-full">
                                    <p>Prénom</p>
                                    <input
                                        type="text"
                                        class="w-full p-3 shadow-sm rounded-md border text-sm"
                                        wire:model="prenom"
                                        @if($readOnly) readonly @endif
                                    >
                                    @error('prenom')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <p>Nom</p>
                                    <input
                                        type="text"
                                        class="w-full p-3 shadow-sm rounded-md border text-sm"
                                        wire:model="nom"
                                        @if($readOnly) readonly @endif
                                    >
                                    @error('nom')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full">
                                <p>E-mail</p>
                                <input
                                    type="email"
                                    class="w-full p-3 shadow-sm rounded-md border text-sm"
                                    wire:model="email"
                                    @if($readOnly) readonly @endif
                                >
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <p>Entreprise</p>
                                <input
                                    type="text"
                                    class="w-full p-3 shadow-sm rounded-md border text-sm"
                                    wire:model="entreprise"
                                    @if($readOnly) readonly @endif
                                >
                                @error('entreprise')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <p>Adresse</p>
                                <textarea
                                    class="w-full p-3 shadow-sm rounded-md border text-sm"
                                    wire:model="adresse"
                                    @if($readOnly) readonly @endif
                                ></textarea>
                                @error('adresse')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-1/3">
                                    <p>Code postal</p>
                                    <input
                                        type="number"
                                        class="w-full p-3 shadow-sm rounded-md border text-sm"
                                        wire:model="code_postal"
                                        @if($readOnly) readonly @endif
                                    >
                                    @error('code_postal')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <p>Ville</p>
                                    <input
                                        type="text"
                                        class="w-full p-3 shadow-sm rounded-md border text-sm"
                                        wire:model="ville"
                                        @if($readOnly) readonly @endif
                                    >
                                    @error('ville')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-1/2">
                                <p>Statut</p>
                                <select
                                    class="w-full p-3 shadow-sm rounded-md border text-sm"
                                    wire:model="statut"
                                    @if($readOnly) readonly @endif
                                >
                                    <option value="">Select Status</option>
                                    @foreach($statues as $status)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('statut')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-custom-light-blue p-5 rounded-b-lg">
                    <div class="flex items-end justify-end gap-2">
                        <button
                            type="button"
                            class="focus:border-custom-blue shadow-md py-2 px-4 duration-300 rounded-md border hover:bg-custom-button-blue  hover:text-white text-custom-dark focus:text-white "
                            wire:click="$set('show', false)"
                        >
                            <span>Annuler</span>
                        </button>
                        @if(! $readOnly)
                            <button
                                type="submit"
                                class="bg-custom-button-blue flex items-center justify-center gap-2 shadow-md py-2 px-4 duration-300 rounded-md border focus:bg-custom-blue hover:bg-opacity-80 text-white focus:border-custom-button-blue border-custom-blue"
                            >
                                <span wire:loading>
                                    <x-spinner />
                                </span>
                                <span>Valider</span>
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    @endif

    @if ($showDuplicateOrganizationModal)
        <div>
            <x-modal
                show="{{ $showDuplicateOrganizationModal }}"
                title="Entreprise dupliquée"
                content="
                    <p>Une entreprise avec le même nom existe déjà.</p>
                "
            >
                <button
                    wire:click="confirmDuplicateOrganization"
                    type="button"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                >
                    Confirmer
                </button>
                <button
                    wire:click="closeDuplicateOrganizationModal"
                    type="button"
                    class="focus:border-custom-blue shadow-md py-2 px-4 duration-300 rounded-md border hover:bg-custom-button-blue  hover:text-white text-custom-dark focus:text-white "
                    >
                    Annuler
                </button>
            </x-modal>
        </div>
    @endif

    @yield('modals')
</div>
