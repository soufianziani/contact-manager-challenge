<?php

namespace App\Livewire\Contact\Forms;

use App\Models\Contact;

class EditForm extends Form
{
    protected $listeners = [
        'showEditContactModal' => 'show',
    ];

    public function save()
    {
        $this->validate();

        $contact = Contact::findOrFail($this->id);

        $contact->update([
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'e_mail' => $this->email,
        ]);

        $contact->organisation()->update([
            'nom' => $this->entreprise,
            'adresse' => $this->adresse,
            'code_postal' => $this->code_postal,
            'ville' => $this->ville,
            'statut' => $this->statut
        ]);

        $this->hide();

        $this->dispatch('contact.list.reload', __('Contact modifié avec succès.'));
    }

    public function show($id)
    {
        $contact = Contact::findOrfail($id);
        $this->id = $contact->id;
        $this->prenom = $contact->prenom;
        $this->nom = $contact->nom;
        $this->email = $contact->e_mail;
        $this->entreprise = $contact->organisation->nom ?? '';
        $this->adresse = $contact->organisation->adresse ?? '';
        $this->ville = $contact->organisation->ville ?? '';
        $this->code_postal = $contact->organisation->code_postal ?? '';
        $this->statut = $contact->organisation->statut ?? '';
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.contact.forms.edit-form');
    }
}
