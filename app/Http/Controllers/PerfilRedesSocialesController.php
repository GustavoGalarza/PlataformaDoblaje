<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfile;
use App\Models\RedesSociale;

class PerfilRedesSocialesController extends Controller
{
    // Mostrar modal o datos para editar
    public function edit(Perfile $perfil)
    {
        $redes = RedesSociale::all();
        $redesSeleccionadas = $perfil->redesSociales->pluck('id')->toArray();

        return view('portafolio.edit-redes-sociales', compact('perfil', 'redes', 'redesSeleccionadas'));
    }

    // Guardar selección con links
    public function update(Request $request, Perfile $perfil)
    {
        $request->validate([
            'redes_sociales' => 'nullable|array',
            'redes_sociales.*' => 'exists:redes_sociales,id',
            'links' => 'nullable|array',
            'links.*' => 'nullable|string|max:255',
        ]);

        $syncData = [];
        if ($request->redes_sociales) {
            foreach ($request->redes_sociales as $id) {
                $syncData[$id] = [
                    'link' => $request->links[$id] ?? null
                ];
            }
        }

        $perfil->redesSociales()->sync($syncData);

        return redirect()->route('mi-portafolio')->with('success', 'Redes sociales actualizadas correctamente.');
    }
}
