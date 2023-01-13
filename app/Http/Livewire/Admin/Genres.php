<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Genres extends Component
{
    public function render()
    {
        return view('livewire.admin.genres')
            ->layout('layouts.loopers', [
                'description' => 'Manage the genre of our movies',
                'title'       => 'Genres',
            ]);
    }
}
