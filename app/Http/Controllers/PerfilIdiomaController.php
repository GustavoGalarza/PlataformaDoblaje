<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfile;
use App\Models\Idioma;

class PerfilIdiomaController extends Controller
{
    // Mostrar el modal o página para asignar idiomas a un perfil
    public function edit(Perfile $perfil)
    {
        $idiomas = Idioma::all(); 
        $idiomasPerfil = $perfil->idiomas()->pluck('idioma_id')->toArray(); 

        return view('portafolio.edit-idiomas', compact('perfil', 'idiomas', 'idiomasPerfil'));
    }

    // Guardar idiomas seleccionados
    public function update(Request $request, Perfile $perfil)
    {
        $request->validate([
            'idiomas' => 'array', // debe ser un array de ids
            'idiomas.*' => 'exists:idiomas,id',
        ]);

        $perfil->idiomas()->sync($request->idiomas ?? []); // sincroniza los idiomas seleccionados

        return redirect()->route('mi-portafolio')->with('success', 'Idiomas actualizados correctamente');
    }
}
