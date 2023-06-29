<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoCard extends Component
{
    public $todo;
    
    public function mount(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function deleteTodo(Todo $todo){
        $this->emit('deleteTodo', $todo);
    }

    public function toggle(Todo $todo)
    {
        //
        $todo->update([
            'is_checked' => ! $todo->is_checked,
        ]);

        // $this->todo = Todo::find($todo->id);

        // dd($todo);
        
        // return redirect()->route('todos.index');
    }

    public function render()
    {
        return view('livewire.todo-card');
    }
}
