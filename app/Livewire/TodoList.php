<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TodoList extends Component
{
    use WithPagination;
    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;
    public $editTodoId;
    #[Rule('required|min:3|max:50')]
    public $newName;

    public function create()
    {
        $this->validateOnly('name');
        Todo::create(['name' => $this->name]);
        $this->reset('name');

        session()->flash('message', " created successfully");
        $this->resetPage();
    }


    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
    }
    public function edit(Todo $todo)
    {
        $this->newName = $todo->name;
        $this->editTodoId = $todo->id;
    }
    public function update()
    {
        $this->validateOnly('newName');
        $todo = Todo::find($this->editTodoId);
        $todo->update(['name' => $this->newName]);
        $this->reset('newName', 'editTodoId');
    }

    public function cancel()
    {
        $this->reset('newName', 'editTodoId');
    }
    public function delete($todoId)
    {
        try {
            $todo = Todo::findOrFail($todoId);
            $todo->delete();
        } catch (Exception $e) {
            session()->flash('Error', 'Todo already deleted');
        }
        return;
    }
    public function render()
    {
        $todos = Todo::latest()->where('name', 'like', '%' . $this->search . '%')->where('completed', false)->paginate(5);

        return view('livewire.todo-list', [
            "todos" => $todos
        ]);
    }
}
