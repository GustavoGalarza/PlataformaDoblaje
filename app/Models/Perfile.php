<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Perfile
 *
 * @property $id_perfil
 * @property $user_id
 * @property $nombre
 * @property $edad
 * @property $email
 * @property $telefono
 * @property $biografia
 * @property $ubicacion
 * @property $disponibilidad
 * @property $diccion_articulacion
 * @property $actuacion_emociones
 * @property $advertencia_vocal
 * @property $home_studio
 * @property $edicion_postproduccion
 * @property $entregas_flujo_trabajo
 * @property $creditos
 * @property $formacion
 * @property $reconocimientos
 * @property $foto_url
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Perfile extends Model
{
    protected $primaryKey = 'id_perfil';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_perfil', 'user_id', 'nombre', 'edad', 'email', 'telefono', 'biografia', 'ubicacion', 'disponibilidad', 'diccion_articulacion', 'actuacion_emociones', 'advertencia_vocal', 'home_studio', 'edicion_postproduccion', 'entregas_flujo_trabajo', 'creditos', 'formacion', 'reconocimientos', 'foto_url', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
