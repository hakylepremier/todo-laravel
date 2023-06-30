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
    // public $addForm = true;

    // public $listeners = [
    //     'addForm' => 'form',
    //     'editForm' => 'editForm',
    // ];

    // public function form()
    // {
    //     $this->addForm = true;
    // }

    // public function editForm()
    // {
    //     $this->addForm = false;
    // }

    public function index()
    {
        return view('begin');
    }
    
    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.index');
    }
}
