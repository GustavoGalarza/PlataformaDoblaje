<?php

namespace App\Http\Controllers;

use App\Models\AcentosDialecto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AcentosDialectoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AcentosDialectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $acentosDialectos = AcentosDialecto::paginate();

        return view('acentos-dialecto.index', compact('acentosDialectos'))
            ->with('i', ($request->input('page', 1) - 1) * $acentosDialectos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $acentosDialecto = new AcentosDialecto();

        return view('acentos-dialecto.create', compact('acentosDialecto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcentosDialectoRequest $request): RedirectResponse
    {
        AcentosDialecto::create($request->validated());

        return Redirect::route('panel-habilidades')
            ->with('success', 'Acentos/Dialecto Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $acentosDialecto = AcentosDialecto::find($id);

        return view('acentos-dialecto.show', compact('acentosDialecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $acentosDialecto = AcentosDialecto::find($id);

        return view('acentos-dialecto.edit', compact('acentosDialecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcentosDialectoRequest $request, AcentosDialecto $acentosDialecto): RedirectResponse
    {
        $acentosDialecto->update($request->validated());

        return Redirect::route('panel-habilidades')
            ->with('success', 'Acentos/Dialecto Actualizado Exitosamente');
    }

    public function destroy($id): RedirectResponse
    {
        AcentosDialecto::find($id)->delete();

        return Redirect::route('panel-habilidades')
            ->with('success', 'Acentos/Dialecto Eliminado Exitosamente');
    }
}
