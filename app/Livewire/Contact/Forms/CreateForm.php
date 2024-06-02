<?php

namespace App\Livewire\Contact\Forms;

use App\Models\Contact;
use App\Models\Organisation;

class CreateForm extends Form
{
    public bool $forceCreateContact = false;
    public bool $forceCreateOrganization = false;
    public bool $showDuplicateContactModal = false;
    public bool $showDuplicateOrganizationModal = false;

    protected $listeners = [
        'showCreateContactModal' => 'show',
    ];

    public function show()
    {
        $this->show = true;
    }

    public function save()
    {
        $this->validate();

        if (! $this->forceCreateContact) {
            $existingContact = Contact::query()
                ->where('prenom', strtolower($this->prenom))
                ->where('nom', strtolower($this->nom))
                ->exists();

            if ($existingContact) {
                $this->showDuplicateContactModal = true;
                return;
            }
        }

        if (! $this->forceCreateOrganization) {
            $existingOrganization = Organisation::query()
                ->where('nom', strtolower($this->entreprise))
                ->exists();

            if ($existingOrganization) {
                $this->showDuplicateOrganizationModal = true;
                return;
            }
        }

        $organisation = Organisation::create([
            'nom' => $this->entreprise,
            'adresse' => $this->adresse,
            'code_postal' => $this->code_postal,
            'ville' => $this->ville,
            'statut' => $this->statut
        ]);

        $organisation->contacts()->create([
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'e_mail' => $this->email,
            'organisation_id' => $organisation->id,
        ]);

        $this->reset();

        $this->dispatch('contact.list.reload', __('Contact Ajoute avec succès.'));
    }

    public function confirmDuplicateContact()
    {
        $this->showDuplicateContactModal = false;
        $this->forceCreateContact = true;
        $this->save();
    }

    public function confirmDuplicateOrganization()
    {
        $this->showDuplicateOrganizationModal = false;
        $this->forceCreateOrganization = true;
        $this->save();
    }

    public function closeDuplicateContactModal()
    {
        $this->showDuplicateContactModal = false;
    }

    public function closeDuplicateOrganizationModal()
    {
        $this->showDuplicateOrganizationModal = false;
    }

    public function render()
    {
        return view('livewire.contact.forms.create-form');
    }
}
