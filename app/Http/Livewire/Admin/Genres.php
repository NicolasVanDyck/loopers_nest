<?php

namespace App\Http\Livewire\Admin;

use App\Models\Genre;
use Livewire\Component;

class Genres extends Component
{
    public $orderBy = 'name';
    public $orderAsc = true;
    public $newGenre;
    public $perPage = 5;
    public $editGenre = ['id' => null, 'name' => null];

    //validation rules
    public function rules()
    {
        return [
            'newGenre'       => 'required|min:3|max:30|unique:genres,name',
            'editGenre.name' => 'required|min:3|max:30|unique:genres,name,',
        ];
    }

// custom validation messages
    protected $messages = [
        'newGenre.required'       => 'Please enter a genre name.',
        'newGenre.min'            => 'The new name must contains at least 3 characters and no more than 30 characters.',
        'newGenre.max'            => 'The new name must contains at least 3 characters and no more than 30 characters.',
        'newGenre.unique'         => 'This name already exists.',
        'editGenre.name.required' => 'Please enter a genre name.',
        'editGenre.name.min'      => 'This name is too short (must be between 3 and 30 characters).',
        'editGenre.name.max'      => 'This name is too long (must be between 3 and 30 characters)',
        'editGenre.name.unique'   => 'This name is already in use.',
    ];

    // delete a genre
    public function deleteGenre(Genre $genre)
    {
        $genre->delete();
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html'       => "The genre <b><i>{$genre->name}</i></b> has been deleted",
        ]);
    }

    // reset $newGenre and validation

    public function resetNewGenre()
    {
        $this->reset('newGenre');
        $this->resetErrorBag();
    }

    // reset $editGenre and validation

    public function resetEditGenre()
    {
        $this->reset('editGenre');
        $this->resetErrorBag();
    }


    // update an existing genre
    public function updateGenre(Genre $genre)
    {
        $this->validateOnly('editGenre.name');
        $oldName = $genre->name;
        $genre->update([
            'name' => trim($this->editGenre['name']),
        ]);
        $this->resetEditGenre();
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html'       => "The genre <b><i>{$oldName}</i></b> has been updated to <b><i>{$genre->name}</i></b>",
        ]);
    }


    //create a new genre
    public function createGenre()
    {
        //validate genre name
        $this->validateOnly('newGenre');
        //create genre
        $genre = Genre::create([
            'name' => trim($this->newGenre)
        ]);
        // reset $newGenre
        $this->resetNewGenre();
        // toast
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html'       => "The genre <b><i>{$genre->name}</i></b> has been added",
        ]);
    }


    // resort the genres by the given column

    public function resort($column)
    {
        if ($this->orderBy === $column) {
            $this->orderAsc = !$this->orderAsc;
        } else {
            $this->orderAsc = true;
        }
        $this->orderBy = $column;
    }

    // edit the value of $editGenre (show inlined edit form)
    public function editExistingGenre(Genre $genre)
    {
        $this->editGenre = [
            'id'   => $genre->id,
            'name' => $genre->name,
        ];
    }

    public function render()
    {
        $genres = Genre::withCount('movies')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.admin.genres', compact('genres'))
            ->layout('layouts.loopers', [
                'description' => 'Manage the genre of our movies',
                'title'       => 'Genres',
            ]);
    }
}
