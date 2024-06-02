<?php

namespace App\Livewire\Contact\Forms;

use App\Enums\OrganizationStatus;
use Illuminate\Validation\Rules\In;
use Livewire\Component;

abstract class Form extends Component
{
    public bool $show = false;
    public bool $readOnly = false;
    public bool $showDuplicateContactModal = false;
    public bool $showDuplicateOrganizationModal = false;

    public string $id;
    public string $prenom;
    public string $nom;
    public string $email;
    public string $entreprise;
    public string $adresse;
    public string $ville;
    public string $code_postal;
    public string $statut;
    public array $statues;

    public function __construct()
    {
        $this->statues = OrganizationStatus::values();
    }

    public function getRules(): array
    {
        return [
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required|email',
            'entreprise' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'code_postal' => 'required|numeric|digits:5',
            'statut' => ['required', new In(OrganizationStatus::values())],
        ];
    }

    public function hide()
    {
        $this->show = false;
    }

    public function closeDuplicateContactModal()
    {
        $this->showDuplicateContactModal = false;
    }

    public function closeDuplicateOrganizationModal()
    {
        $this->showDuplicateOrganizationModal = false;
    }

    abstract function save();
}
