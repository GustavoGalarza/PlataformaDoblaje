<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Demo;
use App\Models\Perfile;
use App\Models\Idioma;
use App\Models\TipoVoz;
use App\Models\EstilosVoz;
use App\Models\RangoVocal;
use App\Models\TimbreVoz;
use App\Models\AcentosDialecto;

class DemoController extends Controller
{
    /**
     * Mostrar formulario para agregar demo
     */
    public function create()
    {
        $perfil = Perfile::where('user_id', Auth::id())->firstOrFail();
         // Cargar datos para selects
        $idiomas= Idioma::all();
        $tiposVoz= TipoVoz::all();
        $estilosVoz= EstilosVoz::all();
        $rangosVocales= RangoVocal::all();
        $timbresVoz= TimbreVoz::all();
        $acentos= AcentosDialecto::all();
         return view('demos.create', compact('perfil', 'idiomas', 'tiposVoz', 'estilosVoz', 'rangosVocales', 'timbresVoz', 'acentos'));
    }

    /**
     * Guardar demo en DB y Cloudinary
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'archivo'      => 'required|file|mimes:mp3,wav,mp4,mov,avi|max:30720', // 30MB
            'portada'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tipo_archivo' => 'required|in:audio,video',
            'idioma_id'     => 'nullable|exists:idiomas,id',
            'tipo_voz_id'   => 'nullable|exists:tipo_voz,id',
            'estilo_voz_id' => 'nullable|exists:estilos_voz,id',
            'rango_vocal_id'=> 'nullable|exists:rango_vocal,id',
            'timbre_voz_id' => 'nullable|exists:timbre_voz,id',
            'acento_id'     => 'nullable|exists:acentos_dialectos,id',
        ]);

        $perfil = Perfile::where('user_id', Auth::id())->firstOrFail();

        // Subir archivo principal
        $archivoUrl = Storage::disk('cloudinary')->putFile('demos', $request->file('archivo'), 'public');

        // Subir portada si existe
        $portadaUrl = null;
        if ($request->hasFile('portada')) {
            $portadaUrl = Storage::disk('cloudinary')->putFile('demos', $request->file('portada'), 'public');
        }

        // Crear registro
        Demo::create([
            'perfil_id'    => $perfil->id_perfil,
            'titulo'       => $request->titulo,
            'descripcion'  => $request->descripcion,
            'archivo_url'  => $archivoUrl,
            'tipo_archivo' => $request->tipo_archivo,
            'portada_url'  => $portadaUrl,
            'idioma_id'      => $request->idioma_id,
            'tipo_voz_id'    => $request->tipo_voz_id,
            'estilo_voz_id'  => $request->estilo_voz_id,
            'rango_vocal_id' => $request->rango_vocal_id,
            'timbre_voz_id'  => $request->timbre_voz_id,
            'acento_id'      => $request->acento_id,
            'visibilidad'    => 1,
            'estado'         => 'activo',
            'fecha_subida'   => now(),
        ]);

        return redirect()->route('mi-portafolio')->with('success', 'Demo cargado correctamente.');
    }
}
