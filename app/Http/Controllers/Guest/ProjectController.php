<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('guest.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
       return view('guest.projects.show', compact('project'));
    }

    public function update(Request $request, Project $project)
    {   
        $data = $this->validation($request->all());

            if(Arr::exists($data, 'link')) {
            $path = Storage::put('uploads/projects', $data['link']);
            $data['link'] = $path;
        }
        
        $project->update($data);
        return to_route('admin.projects.show', $project);
        // ->with('message_content', "Project $project->id modificato con successo!");
    }

    private function validation($data) 
    {
        $validator = Validator::make(
            $data,
            [
            'title' => 'required|string|max:100',
            'link' => 'nullable|image|mimes:jpg,png,jpeg',
            'date' => 'required|string',
            'description' => 'nullable|string',
            'type_id' => 'nullable|exists:types,id',
            'label' => 'required|string|max:30',
            'color' => 'required|string|size:7',
        ],
        [
            'title.required' => 'il titolo è obbligatorio',
            'title.string' => 'il titolo deve essere una stringa',
            'title.max' => 'il titolo deve avere al massimo 100 catteri',

            'link.image' => 'il link all\' immagine è obbligatorio',
            'link.mimes' => 'le estensioni accettate sono: jpg, png, jpeg',

            'date.required' => 'la data è obbligatoria',
            'date.string' => 'la data deve essere in formato data',

            'description.string' => 'la descrizione deve essere una stringa',

            'type_id.exists' => 'l\' ID della tipologia non è valido',

            'label.required' => 'la label è obbligatoria',
            'label.string' => 'la label deve essere una stringa',
            'label.max' => 'la label deve essere massimo dio 30 caratteri',

            'color.required' => 'il colore è obbligatorio',
            'color.string' => 'il colore deve essere una stringa',
            'color.size' => 'il colore deve essere esattamente 7 caratteri (\'#234567\')',


        ])->validate();

        return $validator;
    }
}