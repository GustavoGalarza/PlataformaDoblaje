<?php

namespace App\Http\Controllers;

use App\Models\TipoVoz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TipoVozRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TipoVozController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tipoVozs = TipoVoz::paginate();

        return view('tipo-voz.index', compact('tipoVozs'))
            ->with('i', ($request->input('page', 1) - 1) * $tipoVozs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipoVoz = new TipoVoz();

        return view('tipo-voz.create', compact('tipoVoz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoVozRequest $request): RedirectResponse
    {
        TipoVoz::create($request->validated());

        return Redirect::route('panel-habilidades')
            ->with('success', 'Tipo de Voz creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tipoVoz = TipoVoz::find($id);

        return view('tipo-voz.show', compact('tipoVoz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tipoVoz = TipoVoz::find($id);

        return view('tipo-voz.edit', compact('tipoVoz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoVozRequest $request, TipoVoz $tipoVoz): RedirectResponse
    {
        $tipoVoz->update($request->validated());

        return Redirect::route('panel-habilidades')
            ->with('success', 'Tipo de Voz Actualizado exitosamente');
    }

    public function destroy($id): RedirectResponse
    {
        TipoVoz::find($id)->delete();

        return Redirect::route('panel-habilidades')
            ->with('success', 'Tipo de Voz Eliminado Exitosamente');
    }
}
