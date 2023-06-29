<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Todo;
use Livewire\Component;

class AddForm extends Component
{
    public $categories;
    public $title;
    public $description;
    public $category_id;
    public $formOpen;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
    ];

    public function mount()
    {
        $this->categories = Category::all();

        // $this->todos = Todo::with('category')->get();
        // $this->formOpen = false;

        // $this->todos = Todo::all();
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

        $this->title = "";
        $this->description = "";
        $this->category_id = "";
    }

    public function render()
    {
        return view('livewire.add-form');
    }

}
