<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			
			'user_id' => 'required',
			'nombre' => 'string',
			'edad' => 'string',
			'email' => 'string',
			'telefono' => 'string',
			'biografia' => 'string',
			'ubicacion' => 'string',
			'disponibilidad' => 'string',
			'diccion_articulacion' => 'string',
			'actuacion_emociones' => 'string',
			'advertencia_vocal' => 'string',
			'home_studio' => 'string',
			'edicion_postproduccion' => 'string',
			'entregas_flujo_trabajo' => 'string',
			'creditos' => 'string',
			'formacion' => 'string',
			'reconocimientos' => 'string',
			'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif,svg|max:2048',
			'estado' => 'required|string',
        ];
    }
}
