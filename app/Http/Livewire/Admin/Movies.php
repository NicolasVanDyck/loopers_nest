<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Movies extends Component
{
    public function render()
    {
        return view('livewire.admin.movies')
            ->layout('layouts.loopers', [
                'description' => 'Manage the movies of your movie store',
                'title'       => 'Movies',
            ]);
    }
}
