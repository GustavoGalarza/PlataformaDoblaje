<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
			'titulo' => 'required|string',
			'contenido' => 'string',
			'tipo_publicacion' => 'required',
			'archivo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'fecha_publicacion' => 'string',
			'fecha_evento' => 'string',
			'lugar' => 'string',
			'enlace_transmision' => 'string',
			'requiere_inscripcion' => 'required',
			'certificado' => 'required',
			'estado' => 'required',
        ];
    }
}
