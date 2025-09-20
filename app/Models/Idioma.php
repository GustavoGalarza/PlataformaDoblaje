<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Idioma
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Idioma extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre'];

    // Relación muchos a muchos con Perfile
    public function perfiles()
    {
        return $this->belongsToMany(
            \App\Models\Perfile::class, // Modelo relacionado
            'perfil_idioma',            // Tabla pivot
            'idioma_id',                // FK de este modelo en la tabla pivot
            'perfil_id'                 // FK del modelo relacionado en la tabla pivot
        )->withTimestamps();
    }
}
