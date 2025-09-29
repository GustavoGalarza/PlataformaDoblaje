<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class Demo extends Model
{
    protected $table = 'demos';
    protected $primaryKey = 'id_demo';
    protected $perPage = 20;

    protected $fillable = [
        'perfil_id',
        'titulo',
        'descripcion',
        'archivo_url',
        'tipo_archivo',
        'portada_url',
        'idioma_id',
        'tipo_voz_id',
        'estilo_voz_id',
        'rango_vocal_id',
        'timbre_voz_id',
        'acento_id',
        'visibilidad',
        'fecha_subida',
        'estado',
    ];

    // Relaciones
    public function perfil()
    {
        return $this->belongsTo(\App\Models\Perfile::class, 'perfil_id', 'id_perfil');
    }

    public function idioma()
    {
        return $this->belongsTo(\App\Models\Idioma::class, 'idioma_id');
    }

    public function tipoVoz()
    {
        return $this->belongsTo(\App\Models\TipoVoz::class, 'tipo_voz_id');
    }

    public function estiloVoz()
    {
        return $this->belongsTo(\App\Models\EstilosVoz::class, 'estilo_voz_id');
    }

    public function rangoVocal()
    {
        return $this->belongsTo(\App\Models\RangoVocal::class, 'rango_vocal_id');
    }

    public function timbreVoz()
    {
        return $this->belongsTo(\App\Models\TimbreVoz::class, 'timbre_voz_id');
    }

    public function acento()
    {
        return $this->belongsTo(\App\Models\AcentosDialecto::class, 'acento_id');
    }
    

}
