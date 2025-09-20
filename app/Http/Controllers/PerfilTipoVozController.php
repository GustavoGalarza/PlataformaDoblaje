<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfile;
use App\Models\TipoVoz;

class PerfilTipoVozController extends Controller
{
    // Mostrar modal o datos (para cargar en la vista, opcional)
    public function edit(Perfile $perfil)
    {
        $tiposVoz = TipoVoz::all();
        $tiposSeleccionados = $perfil->tiposVoz->pluck('id')->toArray();

        return view('portafolio.edit-tipos-voz', compact('perfil', 'tiposVoz', 'tiposSeleccionados'));
    }

    // Guardar selección
    public function update(Request $request, Perfile $perfil)
    {
        $request->validate([
            'tipos_voz' => 'nullable|array',
            'tipos_voz.*' => 'exists:tipo_voz,id',
        ]);

        $perfil->tiposVoz()->sync($request->tipos_voz ?? []);

        return redirect()->route('mi-portafolio')->with('success', 'Tipos de voz actualizados correctamente.');
    }
}
