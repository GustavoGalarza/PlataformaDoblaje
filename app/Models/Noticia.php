<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Noticia
 *
 * @property $id
 * @property $user_id
 * @property $titulo
 * @property $contenido
 * @property $tipo_publicacion
 * @property $archivo_url
 * @property $fecha_publicacion
 * @property $fecha_evento
 * @property $lugar
 * @property $enlace_transmision
 * @property $requiere_inscripcion
 * @property $certificado
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Noticia extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'titulo', 'contenido', 'tipo_publicacion', 'archivo_url', 'fecha_publicacion', 'fecha_evento', 'lugar', 'enlace_transmision', 'requiere_inscripcion', 'certificado', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
/**too */