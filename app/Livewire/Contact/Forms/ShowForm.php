<?php

namespace App\Livewire\Contact\Forms;

use App\Models\Contact;

class ShowForm extends Form
{
    protected $listeners = [
        'showShowContactModal' => 'show',
    ];

    public function save()
    {
        //
    }

    public function show($id)
    {
        $this->readOnly = true;
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
        return view('livewire.contact.forms.show-form');
    }
}
