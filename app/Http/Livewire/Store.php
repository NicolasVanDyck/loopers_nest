<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Store extends Component
{
    public function render()
    {
        return view('livewire.store')
            ->layout('layouts.loopers', [
                'description' => "Looper's Nest Store Page",
                'title'       => 'Store',
            ]);
    }
}
