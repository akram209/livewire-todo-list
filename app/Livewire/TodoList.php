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
    public $userId;
    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('date|required|after_or_equal:today')]
    public $date;

    public $search;

    public $editTodoId;

    #[Rule('required|min:3|max:50')]
    public $newName;
    public $filter = '';
    public function create()
    {
        $this->validateOnly('name');
        $this->validateOnly('date');
        Todo::create([
            'name' => $this->name,
            'date' => $this->date,
            'user_id' => auth()->user()->id
        ]);
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
    public function today()
    {


        $this->filter = "today";
    }
    public function upcoming()
    {
        $this->filter = "upcoming";
    }
    public function overdue()
    {
        $this->filter = "overdue";
    }
    public function render()
    {
        if ($this->filter == "today") {
            $todos = Todo::latest()
                ->where('name', 'like', '%' . $this->search . '%')
                ->where('completed', false)
                ->where('user_id', $this->userId)
                ->whereDate('date', now())
                ->paginate(5);
        } elseif ($this->filter == "upcoming") {
            $todos = Todo::latest()
                ->where('name', 'like', '%' . $this->search . '%')
                ->where('completed', false)
                ->where('user_id', $this->userId)
                ->whereDate('date', '>', now())
                ->paginate(5);
        } elseif ($this->filter == "overdue") {
            $todos = Todo::latest()
                ->where('name', 'like', '%' . $this->search . '%')
                ->where('completed', false)
                ->where('user_id', $this->userId)
                ->whereDate('date', '<', now())
                ->paginate(5);
        } else {
            $todos = Todo::latest()
                ->where('name', 'like', '%' . $this->search . '%')
                ->where('completed', false)
                ->where('user_id', $this->userId)
                ->paginate(5);
        }

        return view('livewire.todo-list', [
            'todos' => $todos
        ]);
    }
}
