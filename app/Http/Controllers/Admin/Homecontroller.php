<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Task;

class Homecontroller extends Controller
{
    public function index(Task $task) {

        $tasks = Task::all();
        
        return view('admin.home', compact('tasks'));
    }

    public function guest() {
        
        return view('guest.index');
    }
}