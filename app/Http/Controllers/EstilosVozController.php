<?php

namespace App\Http\Controllers;

use App\Models\EstilosVoz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstilosVozRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstilosVozController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $estilosVozs = EstilosVoz::paginate();

        return view('estilos-voz.index', compact('estilosVozs'))
            ->with('i', ($request->input('page', 1) - 1) * $estilosVozs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estilosVoz = new EstilosVoz();

        return view('estilos-voz.create', compact('estilosVoz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstilosVozRequest $request): RedirectResponse
    {
        EstilosVoz::create($request->validated());

        return Redirect::route('estilos-vozs.index')
            ->with('success', 'EstilosVoz created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $estilosVoz = EstilosVoz::find($id);

        return view('estilos-voz.show', compact('estilosVoz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $estilosVoz = EstilosVoz::find($id);

        return view('estilos-voz.edit', compact('estilosVoz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstilosVozRequest $request, EstilosVoz $estilosVoz): RedirectResponse
    {
        $estilosVoz->update($request->validated());

        return Redirect::route('estilos-vozs.index')
            ->with('success', 'EstilosVoz updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EstilosVoz::find($id)->delete();

        return Redirect::route('estilos-vozs.index')
            ->with('success', 'EstilosVoz deleted successfully');
    }
}
