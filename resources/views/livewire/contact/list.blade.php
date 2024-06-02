<div>
    @if($alert)
        <div wire:poll.3s="hideAlert" class="fixed top-0 mx-auto max-w-md mt-5 left-0 right-0 z-50 bg-green-100 border shadow-lg border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ $alert }}</span>
        </div>
    @endif

    <div>
        <h1 class="text-4xl text-custom-dark">
            Liste des contacts
        </h1>

        <div class="flex justify-between mt-5">
            <div class="w-1/3">
                <input
                    type="text"
                    placeholder="Rechercher"
                    wire:model.live.debounce.300ms="search"
                    class="w-full p-3 shadow-sm rounded-md border text-sm border-custom-lighter-gray-2 text-custom-gray focus:outline-custom-lighter-gray-2"
                />
            </div>

            <button
                wire:click="create"
                class="shadow-md py-2 px-4 duration-300 rounded-md border bg-custom-button-blue focus:bg-custom-blue hover:bg-opacity-80 text-white focus:border-custom-button-blue border-custom-blue"
            >
                <div class="flex justify-evenly items-center">
                    <img src="{{ asset('Icons/add.svg') }}" class="w-5 h-5" alt="add">
                    <p class="px-2">Ajouter</p>
                </div>
            </button>
        </div>

        <div class="relative overflow-x-auto border shadow-sm my-5 rounded-xl">
            @if ($contacts->isEmpty())
                <div class="p-5">
                    <p class="text-center text-custom-gray">Aucun contact trouvé.</p>
                </div>
            @else
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-custom-dark-blue-2 uppercase bg-custom-light-blue">
                        <tr>
                            <th
                                wire:click="sortBy('nom')"
                                scope="col"
                                class="px-6 py-3 tracking-widest cursor-pointer"
                            >
                                Nom du Contact
                                @if ($sortField === 'nom')
                                    <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </th>
                            <th
                                wire:click="sortBy('organisation.nom')"
                                scope="col"
                                class="px-6 py-3 tracking-widest cursor-pointer"
                            >
                                Société
                                @if ($sortField === 'organisation.nom')
                                    <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </th>
                            <th
                                scope="col"
                                class="py-3 tracking-widest cursor-pointer"
                                wire:click="sortBy('organisation.statut')"
                            >
                                Statut
                                @if ($sortField === 'organisation.statut')
                                    <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-custom-dark-blue">
                        @foreach ($contacts as $contact)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    {{ $contact->nom_complet }}
                                </td>
                                <td class="px-6 py-4 font-semibold">
                                    {{ $contact->organisation->nom }}
                                </td>
                                <td class="py-4">
                                    <span class="px-3 rounded-full font-semibold {{ $contact->organisation->status_color }}">
                                        {{ $contact->organisation->statut }}
                                    </span>
                                </td>                                
                                <td class="py-4 pr-6">
                                    <div class="flex justify-between items-center max-w-32">
                                        <button wire:click="show({{ $contact->id }})">
                                            <img
                                                src="{{ asset('Icons/show.svg') }}"
                                                class="w-5 h-5"
                                                alt="show"
                                            >
                                        </button>
                                        <button wire:click="edit({{ $contact->id }})">
                                            <img
                                                src="{{ asset('Icons/edit.svg') }}"
                                                class="w-5 h-5"
                                                alt="edit"
                                            >
                                        </button>
                                        <button wire:click="delete({{ $contact->id }})">
                                            <img
                                                src="{{ asset('Icons/delete.svg') }}"
                                                class="w-5 h-5"
                                                alt="delete"
                                            >
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div>
            {{ $contacts->links() }}
        </div>
    </div>
</div>
