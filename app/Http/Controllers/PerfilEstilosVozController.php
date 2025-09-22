<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfile;
use App\Models\EstilosVoz;

class PerfilEstilosVozController extends Controller
{
    /**
     * Mostrar formulario para editar los estilos de voz de un perfil
     */
    public function edit(Perfile $perfil)
    {
        $estilosVoz = EstilosVoz::all();
        $estilosSeleccionados = $perfil->estilosVoz->pluck('id')->toArray();

        return view('portafolio.edit-estilos-voz', compact('perfil', 'estilosVoz', 'estilosSeleccionados'));
    }

    /**
     * Actualizar los estilos de voz de un perfil
     */
    public function update(Request $request, Perfile $perfil)
    {
        $request->validate([
            'estilos_voz' => 'nullable|array',
            'estilos_voz.*' => 'exists:estilos_voz,id',
        ]);

        $perfil->estilosVoz()->sync($request->estilos_voz ?? []);

        return redirect()->route('mi-portafolio')->with('success', 'Estilos de voz actualizados correctamente.');
    }
}
