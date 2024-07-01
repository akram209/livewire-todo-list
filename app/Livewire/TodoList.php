<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;
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

    public function delete(Todo $todo)
    {
        $todo->delete();
    }
    public function render()
    {
        $todos = Todo::latest()->where('name', 'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.todo-list', [
            "todos" => $todos
        ]);
    }
}
