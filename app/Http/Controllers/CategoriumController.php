<?php

namespace App\Http\Controllers;

use App\Models\Categorium;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriumRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $categoria = Categorium::paginate();

        return view('categorium.index', compact('categoria'))
            ->with('i', ($request->input('page', 1) - 1) * $categoria->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categorium = new Categorium();

        return view('categorium.create', compact('categorium'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriumRequest $request): RedirectResponse
    {
        Categorium::create($request->validated());

        return Redirect::route('categoria.index')
            ->with('success', 'Categoria creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $categorium = Categorium::find($id);

        return view('categorium.show', compact('categorium'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $categorium = Categorium::find($id);

        return view('categorium.edit', compact('categorium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriumRequest $request, Categorium $categorium): RedirectResponse
    {
        $categorium->update($request->validated());

        return Redirect::route('categoria.index')
            ->with('success', 'Categoria Actualizada Exitosamente');
    }

    public function destroy($id): RedirectResponse
    {
        Categorium::find($id)->delete();

        return Redirect::route('categoria.index')
            ->with('success', 'Categoria Eliminada Exitosamente');
    }
}
