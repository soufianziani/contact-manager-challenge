<?php

namespace App\Livewire\Contact\Modals;

use App\Models\Contact;
use Livewire\Component;

class DeleteModal extends Component
{
    public ?Contact $contact;
    public bool $show = false;

    protected $listeners = [
        'showDeleteContactModal' => 'show',
    ];

    public function show($id)
    {
        $this->contact = Contact::findOrfail($id);
        $this->show = true;
    }

    public function hide()
    {
        $this->show = false;
        $this->contact = null;
    }

    public function delete()
    {
        $this->contact->delete();

        $this->hide();

        $this->dispatch('contact.list.reload', __('Contact supprimé avec succès.'));
    }

    public function render()
    {
        return view('livewire.contact.modals.delete-modal');
    }
}
