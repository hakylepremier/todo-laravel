<?php

namespace App\Http\Livewire;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Category;
use App\Models\Todo;
use Livewire\Component;

class Index extends Component
{
    public $todos;
    public $categories;

    public function index()
    {
        //
        // $todos = Todo::with('category')->get();
        // $categories = Category::all();
        
        // return view('index', compact('todos', 'categories'));
        // return view('index', compact('categories'));
        return view('begin');
    }
    
    public function mount()
    {
        $this->categories = Category::all();

        // $this->todos = Todo::with('category')->get();
        // $this->formOpen = false;

        // $this->todos = Todo::all();
    }

    public function render()
    {
        return view('livewire.index');
    }
}
