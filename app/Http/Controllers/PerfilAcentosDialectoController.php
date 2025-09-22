<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfile;
use App\Models\AcentosDialecto;

class PerfilAcentosDialectoController extends Controller
{
    // Mostrar modal con datos actuales
    public function edit(Perfile $perfil)
    {
        $acentos = AcentosDialecto::all();
        $acentosSeleccionados = $perfil->acentosDialectos->pluck('id')->toArray();

        return view('portafolio.edit-acentos-dialectos', compact('perfil', 'acentos', 'acentosSeleccionados'));
    }

    // Guardar selección
    public function update(Request $request, Perfile $perfil)
    {
        $request->validate([
            'acentos_dialectos' => 'nullable|array',
            'acentos_dialectos.*' => 'exists:acentos_dialectos,id',
        ]);

        $perfil->acentosDialectos()->sync($request->acentos_dialectos ?? []);

        return redirect()->route('mi-portafolio')->with('success', 'Acentos y dialectos actualizados correctamente.');
    }
}
