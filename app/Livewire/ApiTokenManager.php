<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Features;
use Illuminate\Support\Facades\Session;


class ApiTokenManager extends Component
{
    public $managingPermissionsFor;
    public $updateApiTokenForm = [
        'permissions' => [],
    ];

    public function mount($token)
    {
        $this->managingPermissionsFor = $token;
        $this->updateApiTokenForm['permissions'] = $token->abilities;
    }

    public function updateApiToken()
    {
        $this->validate([
            'updateApiTokenForm.permissions' => 'array',
        ]);

        $this->managingPermissionsFor->update([
            'abilities' => $this->updateApiTokenForm['permissions'],
        ]);

        $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Token permissions updated.']);
    }

    public function render()
    {
        return view('livewire.api-token-manager');
    }
}
