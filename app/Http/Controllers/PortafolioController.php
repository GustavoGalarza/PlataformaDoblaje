<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Perfile;
use Illuminate\Support\Facades\Storage;

class PortafolioController extends Controller
{
    /**
     * Mostrar el portafolio del usuario logueado
     */
    public function miPortafolio()
    {
        // Obtener el usuario logueado
        $user = Auth::user();

        if (!$user) {
            // Si no está logueado, redirigir a login o mostrar vista pública
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu portafolio');
        }

        // Cargar el perfil relacionado con el usuario
        $perfil = Perfile::where('user_id', $user->id)->first();

        return view('portafolio.mi-perfil', compact('perfil', 'user'));
    }

    public function create()
{
    $perfil = \App\Models\Perfile::where('user_id', Auth::id())->first();
    if($perfil){
        return redirect()->route('mi-portafolio');
    }

    return view('portafolio.create');
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'edad' => 'required|integer|min:1',
        'email' => 'required|email',
        'telefono' => 'nullable|string|max:20',
        'biografia' => 'nullable|string',
        'ubicacion' => 'nullable|string|max:255',
        'disponibilidad' => 'nullable|string|max:255',
        'diccion_articulacion' => 'nullable|string|max:255',
        'actuacion_emociones' => 'nullable|string|max:255',
        'advertencia_vocal' => 'nullable|string|max:255',
        'home_studio' => 'nullable|string|max:255',
        'edicion_postproduccion' => 'nullable|string|max:255',
        'entregas_flujo_trabajo' => 'nullable|string|max:255',
        'creditos' => 'nullable|string',
        'formacion' => 'nullable|string',
        'reconocimientos' => 'nullable|string',
        'foto_url' => 'nullable|image|max:2048',
    ]);

    $data = $request->all();
    $data['user_id'] = Auth::id();

    if($request->hasFile('foto_url')){
        $file = $request->file('foto_url');
        $uploadedFileUrl = Storage::disk('cloudinary')->putFile('perfiles', $file, 'public');
        $data['foto_url'] = $uploadedFileUrl;
    }

    \App\Models\Perfile::create($data);

    return redirect()->route('mi-portafolio')->with('success', 'Perfil creado correctamente');
}



    /**
     * Mostrar portafolio de cualquier perfil (para futuros buscadores)
     */
    public function verPortafolio($id_perfil)
    {
        $perfil = Perfile::findOrFail($id_perfil);

        return view('portafolio.ver-perfil', compact('perfil'));
    }
}
