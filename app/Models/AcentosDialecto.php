<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AcentosDialecto
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AcentosDialecto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripcion'];
public function perfiles()
{
    return $this->belongsToMany(
        \App\Models\Perfile::class,         // Modelo relacionado
        'perfil_acento_dialecto',            // Tabla pivot
        'acento_dialecto_id',                // FK de este modelo en la tabla pivot
        'perfil_id'                           // FK del modelo relacionado en la tabla pivot
    )->withTimestamps();
}



}
