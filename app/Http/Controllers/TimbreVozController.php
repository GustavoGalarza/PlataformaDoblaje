<?php

namespace App\Http\Controllers;

use App\Models\TimbreVoz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TimbreVozRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TimbreVozController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $timbreVozs = TimbreVoz::paginate();

        return view('timbre-voz.index', compact('timbreVozs'))
            ->with('i', ($request->input('page', 1) - 1) * $timbreVozs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $timbreVoz = new TimbreVoz();

        return view('timbre-voz.create', compact('timbreVoz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TimbreVozRequest $request): RedirectResponse
    {
        TimbreVoz::create($request->validated());

        return Redirect::route('timbre-vozs.index')
            ->with('success', 'TimbreVoz created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $timbreVoz = TimbreVoz::find($id);

        return view('timbre-voz.show', compact('timbreVoz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $timbreVoz = TimbreVoz::find($id);

        return view('timbre-voz.edit', compact('timbreVoz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimbreVozRequest $request, TimbreVoz $timbreVoz): RedirectResponse
    {
        $timbreVoz->update($request->validated());

        return Redirect::route('timbre-vozs.index')
            ->with('success', 'TimbreVoz updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TimbreVoz::find($id)->delete();

        return Redirect::route('timbre-vozs.index')
            ->with('success', 'TimbreVoz deleted successfully');
    }
}
