<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::paginate(10);
        return view('technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Technology $technology)
    {
        return view('technologies.form', compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:30',
            'color' => 'required|string|size:7',
        ], [
            'label.required' => 'la label è obbligatoria',
            'label.string' => 'la label deve essere una stringa',
            'label.max' => 'la label deve essere massimo dio 30 caratteri',

            'color.required' => 'il colore è obbligatorio',
            'color.string' => 'il colore deve essere una stringa',
            'color.size' => 'il colore deve essere esattamente 7 caratteri (\'#234567\')',
        ]);
        
        $technology = new Technology();
        $technology->fill($request->all());
        $technology->save();

        // ! return to_route('technologies.index', $technology)
        // ! ->with('message_content', "Tipologia $technology->id creata con successo");
        return redirect()->route('types.index', $technology);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('technologies.form', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'label' => 'required|string|max:30',
            'color' => 'required|string|size:7',
        ], [
            'label.required' => 'la label è obbligatoria',
            'label.string' => 'la label deve essere una stringa',
            'label.max' => 'la label deve essere massimo dio 30 caratteri',

            'color.required' => 'il colore è obbligatorio',
            'color.string' => 'il colore deve essere una stringa',
            'color.size' => 'il colore deve essere esattamente 7 caratteri (\'#234567\')',
        ]);

    
        $technology->update($request->all());

        return to_route('technologies.index', $technology)
        ->with('message_content', "Tecnologia $technology->id modificata con successo");

        // return redirect()->route('types.index', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        // return redirect()->route('types.index');
        return to_route('technologies.index')
        ->with('message_type', "danger")
        ->with('message_content', "Tipologia $technology->id eliminata con successo");
    }

    // private function validation($data) {
    //    $validator = Validator::make(
    //         $data,
    //         [
    //         'label' => 'required|string|max:30',
    //         'color' => 'required|string|size:7',
    //     ], [
    //         'label.required' => 'la label è obbligatoria',
    //         'label.string' => 'la label deve essere una stringa',
    //         'label.max' => 'la label deve essere massimo dio 30 caratteri',

    //         'color.required' => 'il colore è obbligatorio',
    //         'color.string' => 'il colore deve essere una stringa',
    //         'color.size' => 'il colore deve essere esattamente 7 caratteri (\'#234567\')',
    //     ])->validate();

    //     return $validator;
    // }

    // $data = $this->validation($request->all()); -> update&store
}