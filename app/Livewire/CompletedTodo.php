<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;


class CompletedTodo extends Component
{
    use WithPagination;

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
        $todos = Todo::where('user_id', auth()->user()->id)->where('completed', true)->paginate(4);
        return view('livewire.completed-todo', ['todos' => $todos]);
    }
}
