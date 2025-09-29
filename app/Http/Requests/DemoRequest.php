<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiar si necesitas permisos
    }

    public function rules(): array
    {
        return [
            'titulo'        => 'required|string|max:255',
            'descripcion'   => 'nullable|string',
            'archivo'       => 'required_without:id_demo|file|mimes:mp3,wav,mp4,mov,avi|max:30720', // 30MB
            'portada'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 2MB
            'tipo_archivo'  => 'required|in:audio,video',
            'idioma_id'     => 'nullable|exists:idiomas,id',
            'tipo_voz_id'   => 'nullable|exists:tipo_voz,id',
            'estilo_voz_id' => 'nullable|exists:estilos_voz,id',
            'rango_vocal_id' => 'nullable|exists:rango_vocal,id',
            'timbre_voz_id' => 'nullable|exists:timbre_voz,id',
            'acento_id'     => 'nullable|exists:acentos_dialectos,id',
            'visibilidad'   => 'boolean',
            'estado'        => 'nullable|in:activo,archivado,eliminado',
        ];
    }

    /**
     * Preparar datos antes de la validación
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'visibilidad' => $this->has('visibilidad') ? 1 : 0,
        ]);
    }
}
