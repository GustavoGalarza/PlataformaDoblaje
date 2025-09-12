<?php

namespace App\Http\Controllers;

use App\Models\RangoVocal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RangoVocalRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RangoVocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $rangoVocals = RangoVocal::paginate();

        return view('rango-vocal.index', compact('rangoVocals'))
            ->with('i', ($request->input('page', 1) - 1) * $rangoVocals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $rangoVocal = new RangoVocal();

        return view('rango-vocal.create', compact('rangoVocal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RangoVocalRequest $request): RedirectResponse
    {
        RangoVocal::create($request->validated());

        return Redirect::route('rango-vocals.index')
            ->with('success', 'RangoVocal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $rangoVocal = RangoVocal::find($id);

        return view('rango-vocal.show', compact('rangoVocal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $rangoVocal = RangoVocal::find($id);

        return view('rango-vocal.edit', compact('rangoVocal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RangoVocalRequest $request, RangoVocal $rangoVocal): RedirectResponse
    {
        $rangoVocal->update($request->validated());

        return Redirect::route('rango-vocals.index')
            ->with('success', 'RangoVocal updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        RangoVocal::find($id)->delete();

        return Redirect::route('rango-vocals.index')
            ->with('success', 'RangoVocal deleted successfully');
    }
}
