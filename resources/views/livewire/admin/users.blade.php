<div>
    <x-tmk.section class="mb-4 flex gap-2">
        <div class="flex-1">
            <x-jet-input id="search" type="text" placeholder="Filter Name"
                         wire:model.debounce.500ms="name"
                         class="w-full shadow-md placeholder-gray-300"/>
        </div>
        <x-jet-button wire:click="setNewUser()">
            new User
        </x-jet-button>
    </x-tmk.section>

    <x-tmk.section>
        <div class="my-4">{{ $users->links() }}</div>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-14">
                <col class="w-20">
                <col class="w-20">
                <col class="w-max">
                <col class="w-20">
                <col class="w-20">
                <col class="w-24">
            </colgroup>
            <thead>
            <tr class="bg-gray-100 text-gray-700 [&>th]:p-2">
                <th>#</th>
                <th></th>
                <th>Name</th>
                <th>email</th>
                <th>Active</th>
                <th>Admin</th>
                <th>
                    <x-tmk.form.select id="perPage"
                                       wire:model="perPage"
                                       class="block mt-1 w-full">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </x-tmk.form.select>
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr
                    wire:key="user_{{ $user->id }}"
                    class="border-t border-gray-300">
                    <td>{{$user->id}}</td>
                    <td>
                        <img
                            src="{{ $user->profile_photo_path ? '/storage/' . $user->profile_photo_path : '/storage/covers/No_Cover.jpg' }}"
                            alt="no cover"
                            class="my-2 border object-cover">
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->active)
                            1
                        @else
                            0
                        @endif
                    </td>
                    <td>
                        @if($user->admin)
                            1
                        @else
                            0
                        @endif
                    </td>
                    <td>
                        <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid grid-cols-2 h-10">
                            <button
                                wire:click="setNewUser({{ $user->id }})"
                                class="text-gray-400 hover:text-sky-100 hover:bg-sky-500 transition border-r border-gray-300">
                                <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5"/>
                            </button>
                            <button
                                x-data=""
                                @if ($user->id== Auth::id())
                                    @click="confirm('You can't delete yourself')"
                                @else

                                    @click="confirm('Are you sure you want to delete this User?') ? $wire.deleteUser({{ $user->id }}) : ''"
                                @endif
                                class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                                <x-phosphor-trash-duotone class="inline-block w-5 h-5"/>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border-t border-gray-300 p-4 text-center text-gray-500">
                        <div class="font-bold italic text-sky-800">No users found</div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </x-tmk.section>

    <x-jet-dialog-modal id="userModal"
                        wire:model="showModal">
        <x-slot name="title">
            <h3 class="text-black">{{ is_null($newUser['id']) ? 'New User' : 'Edit User' }}</h3>
        </x-slot>
        <x-slot name="content">
            @if ($errors->any())
                <x-tmk.alert type="danger">
                    <x-tmk.list>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </x-tmk.list>
                </x-tmk.alert>
            @endif
            <div class="flex flex-row gap-4 mt-4">
                <div class="flex-1 flex-col gap-2">
                    <x-jet-label for="name" value="name" class="mt-4"/>
                    <x-jet-input id="name" type="text"
                                 wire:model.defer="newUser.name"
                                 class="mt-1 block w-full"/>
                    <x-jet-label for="email" value="e-mail" class="mt-4"/>
                    <x-jet-input id="email" type="text"
                                 wire:model.defer="newUser.email"
                                 class="mt-1 block w-full"/>
                    <x-jet-label for="active" value="active" class="mt-4"/>
                    <x-jet-checkbox name="active"
                                    wire:model.defer="newUser.active"
                                    class="mt-1 block"/>
                    <x-jet-label for="admin" value="admin" class="mt-4"/>
                    <x-jet-checkbox name="admin"
                                    wire:model.defer="newUser.admin"
                                    class="mt-1 block"/>

                </div>
                <img
                    src="{{ $newUser['profile_photo_path'] ? '/storage/' . $newUser['profile_photo_path'] : '/storage/covers/No_Cover.jpg' }}"
                    alt=""
                    class="mt-4 w-40 h-40 border border-gray-300 object-cover">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button @click="show = false">Cancel</x-jet-secondary-button>
            @if(is_null($newUser['id']))
                <x-jet-button
                    wire:click="createUser()"
                    wire:loading.attr="disabled"
                    class="ml-2">Save new user
                </x-jet-button>
            @else
                <x-jet-button
                    color="success"
                    wire:click="updateUser({{ $newUser['id'] }})"
                    wire:loading.attr="disabled"
                    class="ml-2">Update User
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>
