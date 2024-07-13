<?php

namespace App\Livewire;

use App\Events\CreateUserEvent;
use App\Models\Todo;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DashBoardList extends Component
{
    use WithPagination;

    public $numTodos;
    public $search;
    #[Rule('min:3|max:50')]
    public $editName;
    #[Rule('email')]
    public $editEmail;
    public $editIs_admin;
    public $editId;




    public function delete($userId)
    {
        $user = User::find($userId);
        $user->delete();
    }
    #[On('create-user-event')]
    public function handleCreateUserEvent()
    {
    }
    public function edit(User $user)
    {
        $this->editName = $user->name;
        $this->editEmail = $user->email;
        $this->editIs_admin = $user->is_admin;
        $this->editId = $user->id;
    }

    public function update(User $user)
    {
        $this->validate();


        $user->update([
            'name' => $this->editName,
            'email' => $this->editEmail,
            'is_admin' => $this->editIs_admin,
        ]);
        $this->reset('editName', 'editEmail', 'editIs_admin', 'editId');
    }
    public function cancel()
    {
        $this->reset('editName', 'editEmail', 'editIs_admin', 'editId');
    }


    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->paginate(15);

        foreach ($users as $user) {
            $this->numTodos = Todo::where('user_id', $user->id)->count();
            $user->numTodos = $this->numTodos;
        }
        return view('livewire.dash-board-list', ['users' => $users]);
    }
}
