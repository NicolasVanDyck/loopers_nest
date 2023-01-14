<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.admin.movies')
            ->layout('layouts.loopers', [
                'description' => 'Manage the users of your movie store',
                'title'       => 'Users',
            ]);
    }
}
