<?php

namespace App\Http\Controllers;

use App\Models\Perfile;
use App\Models\TimbreVoz;
use Illuminate\Http\Request;

class PerfilTimbreVozController extends Controller
{
    /**
     * Mostrar el formulario de edición de timbres de voz.
     */
    public function edit($perfilId)
    {
        $perfil = Perfile::with('timbresVoz')->findOrFail($perfilId);
        $timbres = TimbreVoz::all();
        $timbresSeleccionados = $perfil->timbresVoz->pluck('id')->toArray();

        return view('portafolio.edit-timbres-voz', compact('perfil', 'timbres', 'timbresSeleccionados'));
    }

    /**
     * Actualizar los timbres de voz de un perfil.
     */
    public function update(Request $request, $perfilId)
    {
        $perfil = Perfile::findOrFail($perfilId);

        $validated = $request->validate([
            'timbres'   => 'array',
            'timbres.*' => 'exists:timbre_voz,id',
        ]);

        $perfil->timbresVoz()->sync($validated['timbres'] ?? []);

        return redirect()->route('mi-portafolio', $perfilId)
            ->with('success', 'Timbres de voz actualizados correctamente.');
    }
}
