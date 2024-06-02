<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Liste extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public string $sortField = 'nom';
    public string $sortDirection = 'asc';
    public string $search = '';
    public ?string $alert = null;

    protected $listeners = [
        'contact.list.reload' => 'reload',
    ];

    public function render()
    {
        $contacts = Contact::query()
            ->with('organisation')
            ->search($this->search)
            ->when(in_array($this->sortField, ['organisation.nom', 'organisation.statut']),
                callback: fn ($query) => $query
                    ->join('organisations', 'contacts.organisation_id', '=', 'organisations.id')
                    ->orderBy('organisations.' . str_replace('organisation.', '', $this->sortField), $this->sortDirection)
                    ->select('contacts.*'),
                default: fn ($query) => $query->orderBy($this->sortField, $this->sortDirection)
            )
            ->paginate($this->perPage);

        return view('livewire.contact.list', [
            'contacts' => $contacts,
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function create()
    {
        $this->dispatch('showCreateContactModal');
    }

    public function edit($id)
    {
        $this->dispatch('showEditContactModal', $id);
    }

    public function show($id)
    {
        $this->dispatch('showShowContactModal', $id);
    }

    public function delete($id)
    {
        $this->dispatch('showDeleteContactModal', $id);
    }

    public function reload(string $message = null)
    {
        $this->resetPage();

        if ($message) {
            $this->alert = $message;
        }
    }

    public function hideAlert()
    {
        $this->alert = null;
    }
}
