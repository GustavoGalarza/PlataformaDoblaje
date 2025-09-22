<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfile;
use App\Models\RangoVocal;

class PerfilRangoVocalController extends Controller
{
    // Mostrar el modal (opcional si usas un modal incluido en mi-portafolio.blade.php)
    public function edit(Perfile $perfil)
    {
        $rangos = RangoVocal::all();
        $rangosSeleccionados = $perfil->rangosVocales->pluck('id')->toArray();

        return view('portafolio.edit-rangos-vocales', compact('perfil', 'rangos', 'rangosSeleccionados'));
    }

    // Guardar la selección
    public function update(Request $request, Perfile $perfil)
    {
        $request->validate([
            'rangos_vocales' => 'nullable|array',
            'rangos_vocales.*' => 'exists:rango_vocal,id',
        ]);

        // Sincronizar selección
        $perfil->rangosVocales()->sync($request->rangos_vocales ?? []);

        return redirect()->route('mi-portafolio')->with('success', 'Rangos vocales actualizados correctamente.');
    }
}
