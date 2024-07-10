<?php

namespace App\Livewire;

use App\Models\Todo;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DashBoardList extends Component
{
    use WithPagination;

    public $users;
    public $numTodos;
    public $completedTodos;

    public function render()
    {
        $this->users = User::all();
        foreach ($this->users as $user) {
            $this->numTodos = Todo::where('user_id', $user->id)->count();
            $this->completedTodos = Todo::where('user_id', $user->id)->where('completed', 1)->count();
            $user->numTodos = $this->numTodos;
            $user->completedTodos = $this->completedTodos;
        }



        return view('livewire.dash-board-list', ['users' => $this->users]);
    }
}
