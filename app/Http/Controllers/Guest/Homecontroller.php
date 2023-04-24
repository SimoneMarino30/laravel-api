<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index(Project $project) {
        $projects = Project::all();
        return view('guest.projects.index', compact('projects'));
    }
}