<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Type;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;



class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate(10);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Type $type)
    {
        return view('admin.types.form', compact('type'));
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

        $type = new Type();
        $type->fill($request->all());
        $type->save();

        return to_route('types.show', $type)
        ->with('message_content', "Tipologia $type->id creata con successo");
        // return redirect()->route('types.index', $type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        // $types = new Type;
        return view('admin.types.form', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
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

        
        $type->update($request->all());

        return to_route('types.show', $type)
        ->with('message_content', "Tipologia $type->id modificata con successo");

        // return redirect()->route('types.index', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        // return redirect()->route('types.index');
        return to_route('types.index')
        ->with('message_type', "danger")
        ->with('message_content', "Tipologia $type->id eliminata con successo");
    }
}