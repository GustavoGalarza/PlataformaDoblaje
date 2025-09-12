<?php

namespace App\Http\Controllers;

use App\Models\RedesSociale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RedesSocialeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RedesSocialeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $redesSociales = RedesSociale::paginate();

        return view('redes-sociale.index', compact('redesSociales'))
            ->with('i', ($request->input('page', 1) - 1) * $redesSociales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $redesSociale = new RedesSociale();

        return view('redes-sociale.create', compact('redesSociale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RedesSocialeRequest $request): RedirectResponse
    {
        RedesSociale::create($request->validated());

        return Redirect::route('redes-sociales.index')
            ->with('success', 'RedesSociale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $redesSociale = RedesSociale::find($id);

        return view('redes-sociale.show', compact('redesSociale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $redesSociale = RedesSociale::find($id);

        return view('redes-sociale.edit', compact('redesSociale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RedesSocialeRequest $request, RedesSociale $redesSociale): RedirectResponse
    {
        $redesSociale->update($request->validated());

        return Redirect::route('redes-sociales.index')
            ->with('success', 'RedesSociale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        RedesSociale::find($id)->delete();

        return Redirect::route('redes-sociales.index')
            ->with('success', 'RedesSociale deleted successfully');
    }
}
