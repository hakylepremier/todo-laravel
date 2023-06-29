<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todos extends Component
{
    public $todos;
    public $categories;

    protected $listeners = [
        'deleteTodo' => 'remove',
        'todos' => 'rerenderTodos'
    ];

    public function mount()
    {
        $this->todos = Todo::with('category')->get();
        // $this->formOpen = false;

        // $this->todos = Todo::all();
    }

    public function rerenderTodos(){
        $this->todos = Todo::with('category')->get();
    }

    public function remove(Todo $todo)
    {
        //
        $todo->delete();

        $this->rerenderTodos();
        // return redirect()->route('todos.index');
        // return view('index');
    }

    public function render()
    {
        return view('livewire.todos');
    }
}
