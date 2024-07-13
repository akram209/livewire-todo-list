<?php

namespace App\Livewire;

use App\Events\CreateUserEvent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateUserBox extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;
    #[Rule('unique:users,email|required|email')]
    public $email;
    #[Rule('required|min:6')]
    public $password;

    public $is_admin = 0;
    public $editId;

    public function create()
    {

        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'is_admin' =>  $this->is_admin == 1 ? 1 : 0
        ]);
        $this->dispatch('create-user-event', user: $user);

        $this->reset('name', 'email', 'password', 'is_admin');
    }
    public function render()
    {
        return view('livewire.create-user-box');
    }
}
