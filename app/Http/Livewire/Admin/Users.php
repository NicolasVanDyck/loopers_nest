<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $orderBy = 'name';
    public $orderAsc = true;

    // filter and pagination
    public $name;
    public $perPage = 5;
    // show/hide the modal
    public $showModal = false;
    // array that contains the values for a new or updated version of the record
    public $newUser = [
        'id'                 => null,
        'name'               => null,
        'email'              => null,
        'active'             => null,
        'admin'              => null,
        'password'           => null,
        'profile_photo_path' => '/storage/covers/No_Cover.jpg',
    ];

    // validation rules (use the rules() method, not the $rules property)
    protected function rules()
    {
        return [
            'newUser.name'               => 'required',
            'newUser.email'              => 'required|email:rfc|unique:users,email,' . $this->newUser['id'],
            'newUser.active'             => 'required|boolean',
            'newUser.admin'              => 'required|boolean',
            'newUser.password'           => ['required', 'string', Password::min(8)->mixedCase()->numbers()->uncompromised(3)],
            'newUser.password_confirmed' => 'required|same:newUser.password',


        ];
    }

    // validation attributes
    protected $validationAttributes = [
        'newUser.name'               => 'name',
        'newUser.email'              => 'e-mail',
        'newUser.active'             => 'active',
        'newUser.admin'              => 'admin',
        'newUser.password'           => 'password',
        'newUser.password_confirmed' => 'confirm password',
    ];

    // set/reset $newUser and validation
    public function setNewUser(User $user = null)
    {
        $this->resetErrorBag();
        if ($user) {
            $this->newUser['id'] = $user->id;
            $this->newUser['name'] = $user->name;
            $this->newUser['email'] = $user->email;
            $this->newUser['active'] = $user->active;
            $this->newUser['admin'] = $user->admin;
            $this->newUser['password'] = '';
            $this->newUser['profile_photo_path'] = $user->profile_photo_path;
        } else {
            $this->reset('newUser');
        }

        $this->showModal = true;
    }

// reset the paginator
    public
    function updated($propertyName, $propertyValue)
    {
        $this->resetPage();
    }

// create a new user
    public
    function createUser()
    {
        $this->validate();
        $user = User::create([
            'name'               => $this->newUser['name'],
            'email'              => $this->newUser['email'],
            'active'             => $this->newUser['active'],
            'admin'              => $this->newUser['admin'],
            'password'           => Hash::make($this->newUser['password']),
            'profile_photo_path' => $this->newUser['profile_photo_path'],
        ]);
        $this->showModal = false;
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html'       => "The user <b><i>{$user->name}</i></b> has been added",
        ]);

    }

    // update an existing User
    public function updateUser(User $user)
    {
        $this->validate();
        $user->update([
            'name'               => $this->newUser['name'],
            'email'              => $this->newUser['email'],
            'active'             => $this->newUser['active'],
            'admin'              => $this->newUser['admin'],
            'password'           => Hash::make($this->newUser['password']),
            'profile_photo_path' => $this->newUser['profile_photo_path'],
        ]);

        $this->showModal = false;
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html'       => "The user <b><i>{$user->name}</i></b> has been updated",
        ]);
    }

// delete an existing record
    public function deleteUser(User $user)
    {
        if ($user->id != Auth::id()) {
            $user->delete();
            $this->dispatchBrowserEvent('swal:toast', [
                'background' => 'success',
                'html'       => "The user <b><i>{$user->title}</i></b> has been deleted",
            ]);
        }
    }

    public function resort($column)
    {
        if ($this->orderBy === $column) {
            $this->orderAsc = !$this->orderAsc;
        } else {
            $this->orderAsc = true;
        }
        $this->orderBy = $column;
    }

    public
    function render()
    {
        $users = User::orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->where([
                ['name', 'like', "%{$this->name}%"],
            ])
            ->paginate($this->perPage);
        return view('livewire.admin.users', compact('users'))
            ->layout('layouts.loopers', [
                'description' => 'Manage the users of our movie store',
                'title'       => 'Users',
            ]);
    }
}
