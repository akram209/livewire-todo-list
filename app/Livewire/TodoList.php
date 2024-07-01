<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;

class TodoList extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public function create()
    {
        $this->validateOnly('name');
        Todo::create(['name' => $this->name]);
        $this->reset('name');

        session()->flash('message', " created successfully");
    }
    public function render()
    {

        return view('livewire.todo-list');
    }
}
