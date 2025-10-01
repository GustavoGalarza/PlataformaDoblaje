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
use Illuminate\Support\Facades\Log; // si quieres mantener logs
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class DemoController extends Controller
{
    /**
     * Mostrar formulario para agregar demo
     */
    public function create()
    {
        $perfil = Perfile::where('user_id', Auth::id())->firstOrFail();
        // Cargar datos para selects
        $idiomas = Idioma::all();
        $tiposVoz = TipoVoz::all();
        $estilosVoz = EstilosVoz::all();
        $rangosVocales = RangoVocal::all();
        $timbresVoz = TimbreVoz::all();
        $acentos = AcentosDialecto::all();
        return view('demos.create', compact('perfil', 'idiomas', 'tiposVoz', 'estilosVoz', 'rangosVocales', 'timbresVoz', 'acentos'));
    }

    /**
     * Guardar demo en DB y Cloudinary
     */
    /**
     * Guardar demo en DB y Cloudinary
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'archivo' => 'required|file|mimes:mp3,wav,mp4,mov,avi|max:30720', // 30MB
            'portada' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tipo_archivo' => 'required|in:audio,video',
            'idioma_id' => 'nullable|exists:idiomas,id',
            'tipo_voz_id' => 'nullable|exists:tipo_voz,id',
            'estilo_voz_id' => 'nullable|exists:estilos_voz,id',
            'rango_vocal_id' => 'nullable|exists:rango_vocal,id',
            'timbre_voz_id' => 'nullable|exists:timbre_voz,id',
            'acento_id' => 'nullable|exists:acentos_dialectos,id',
        ]);

        $perfil = Perfile::where('user_id', Auth::id())->firstOrFail();

        $archivo = $request->file('archivo');
        $tipoArchivo = $request->tipo_archivo;

        // Subir archivo principal a Cloudinary forzando resource_type 'video'
        $cloudinary = new \Cloudinary\Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_KEY'),
                'api_secret' => env('CLOUDINARY_SECRET'),
            ],
        ]);

        $uploaded = $cloudinary->uploadApi()->upload(
            $archivo->getRealPath(),
            [
                'folder' => 'demos',
                'resource_type' => 'video', // importante para audio y video
                'use_filename' => true,
                'unique_filename' => false,
            ]
        );

        $archivoUrl = $uploaded['public_id']; // guardamos public_id en DB

        // Subir portada si existe
        $portadaUrl = null;
        if ($request->hasFile('portada')) {
            $portadaUploaded = $cloudinary->uploadApi()->upload(
                $request->file('portada')->getRealPath(),
                [
                    'folder' => 'demos',
                    'resource_type' => 'image',
                    'use_filename' => true,
                    'unique_filename' => false,
                ]
            );
            $portadaUrl = $portadaUploaded['public_id'];
        }

        // Crear registro
        Demo::create([
            'perfil_id' => $perfil->id_perfil,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'archivo_url' => $archivoUrl,
            'tipo_archivo' => $request->tipo_archivo,
            'portada_url' => $portadaUrl,
            'idioma_id' => $request->idioma_id,
            'tipo_voz_id' => $request->tipo_voz_id,
            'estilo_voz_id' => $request->estilo_voz_id,
            'rango_vocal_id' => $request->rango_vocal_id,
            'timbre_voz_id' => $request->timbre_voz_id,
            'acento_id' => $request->acento_id,
            'visibilidad' => 1,
            'estado' => 'activo',
            'fecha_subida' => now(),
        ]);

        return redirect()->route('mi-portafolio')->with('success', 'Demo cargado correctamente.');
    }


    public function update(Request $request, Demo $demo)
    {
        // Instancia de Cloudinary
        $cloudinary = new \Cloudinary\Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_KEY'),
                'api_secret' => env('CLOUDINARY_SECRET'),
            ],
        ]);

        // Actualizar archivo si se sube uno nuevo
        if ($request->hasFile('archivo')) {
            // Eliminar archivo antiguo si existe
            if ($demo->archivo_url) {
                try {
                    $cloudinary->uploadApi()->destroy($demo->archivo_url, ['resource_type' => 'video']);
                } catch (\Exception $e) {
                    Log::error("No se pudo eliminar archivo antiguo: " . $e->getMessage());
                }
            }

            $uploaded = $cloudinary->uploadApi()->upload(
                $request->file('archivo')->getRealPath(),
                [
                    'folder' => 'demos',
                    'resource_type' => 'video',
                    'use_filename' => true,
                    'unique_filename' => false,
                ]
            );
            $demo->archivo_url = $uploaded['public_id'];
        }

        // Actualizar portada si se sube una nueva
        if ($request->hasFile('portada')) {
            // Eliminar portada antigua si existe
            if ($demo->portada_url) {
                try {
                    $cloudinary->uploadApi()->destroy($demo->portada_url, ['resource_type' => 'image']);
                } catch (\Exception $e) {
                    Log::error("No se pudo eliminar portada antigua: " . $e->getMessage());
                }
            }

            $uploadedPortada = $cloudinary->uploadApi()->upload(
                $request->file('portada')->getRealPath(),
                [
                    'folder' => 'demos',
                    'resource_type' => 'image',
                    'use_filename' => true,
                    'unique_filename' => false,
                ]
            );
            $demo->portada_url = $uploadedPortada['public_id'];
        }

        // Actualizar campos solo si vienen en la request
        if ($request->filled('titulo')) {
            $demo->titulo = $request->titulo;
        }

        if ($request->filled('descripcion')) {
            $demo->descripcion = $request->descripcion;
        }

        if ($request->filled('tipo_archivo')) {
            $demo->tipo_archivo = $request->tipo_archivo;
        }

        if ($request->filled('idioma_id')) {
            $demo->idioma_id = $request->idioma_id;
        }

        if ($request->filled('tipo_voz_id')) {
            $demo->tipo_voz_id = $request->tipo_voz_id;
        }

        if ($request->filled('estilo_voz_id')) {
            $demo->estilo_voz_id = $request->estilo_voz_id;
        }

        if ($request->filled('rango_vocal_id')) {
            $demo->rango_vocal_id = $request->rango_vocal_id;
        }

        if ($request->filled('timbre_voz_id')) {
            $demo->timbre_voz_id = $request->timbre_voz_id;
        }

        if ($request->filled('acento_id')) {
            $demo->acento_id = $request->acento_id;
        }

        // Checkbox visibilidad
        $demo->visibilidad = $request->has('visibilidad') ? 1 : 0;

        // Estado solo si se envía
        if ($request->filled('estado')) {
            $demo->estado = $request->estado;
        }

        $demo->save();

        return redirect()->route('mi-portafolio')->with('success', 'Demo actualizado correctamente.');
    }

    public function destroy(Demo $demo)
    {
        // Instancia de Cloudinary
        $cloudinary = new \Cloudinary\Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_KEY'),
                'api_secret' => env('CLOUDINARY_SECRET'),
            ],
        ]);

        // Eliminar archivo principal si existe
        if ($demo->archivo_url) {
            try {
                $cloudinary->uploadApi()->destroy($demo->archivo_url, ['resource_type' => 'video']);
            } catch (\Exception $e) {
                Log::error("No se pudo eliminar archivo en Cloudinary: " . $e->getMessage());
            }
        }

        // Eliminar portada si existe
        if ($demo->portada_url) {
            try {
                $cloudinary->uploadApi()->destroy($demo->portada_url, ['resource_type' => 'image']);
            } catch (\Exception $e) {
                Log::error("No se pudo eliminar portada en Cloudinary: " . $e->getMessage());
            }
        }

        $demo->delete();

        return redirect()->route('mi-portafolio')->with('success', 'Demo eliminado correctamente.');
    }

}
