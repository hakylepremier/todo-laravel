<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    //
    public function toggleCheck(Todo $todo)
    {
        //
        $todo->update([
            'is_checked' => ! $todo->is_checked,
        ]);
        
        return redirect()->route('todos.index');
    }
}
