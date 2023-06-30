<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoForm extends Component
{
    public Todo $todo;
    public $categories;
    public $title;
    public $description;
    public $category_id;
    public $addForm = true;
    public $formOpen;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
    ];

    public $listeners = [
        'addForm' => 'form',
        'edit' => 'edit'
    ];

    public function form()
    {
        $this->reset(['title', 'description', 'category_id']);
        $this->addForm = true;
    }

    // public function editForm()
    // {
    //     $this->addForm = false;
    // }

    public function mount()
    {
        // $this->categories = Category::all();

        // $this->todos = Todo::with('category')->get();
        // $this->formOpen = false;

        // $this->todos = Todo::all();
    }

    public function edit(Todo $todo)
    {
        $this->addForm = false;
        $this->todo = $todo;
        $this->title = $todo->title;
        $this->description = $todo->description;
        $this->category_id = $todo->category_id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addNew()
    {
        //
        $validatedData = $this->validate();
        
 
        Todo::create($validatedData);

        $this->emit('todos');

        $this->reset(['title', 'description', 'category_id']);

        // $this->title = "";
        // $this->description = "";
        // $this->category_id = "";
    }

    public function update(Todo $todo)
    {
        //
        $validatedData = $this->validate();

        $todo->update($validatedData);

        $this->emit('todo', $todo);
 
        // Todo::create($validatedData);

        // $this->emit('todos');

        $this->reset(['title', 'description', 'category_id']);

        // $this->title = "";
        // $this->description = "";
        // $this->category_id = "";
    }

    public function render()
    {
        return view('livewire.todo-form');
    }
}
