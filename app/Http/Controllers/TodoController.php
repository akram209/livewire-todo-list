<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function destroy(Todo $todo)
    {
        $todo->delete();
    }
}
