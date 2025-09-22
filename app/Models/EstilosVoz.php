<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstilosVoz
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
class EstilosVoz extends Model
{
    protected $table = 'estilos_voz';
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
            \App\Models\Perfile::class,
            'perfil_estilos_voz',
            'estilo_voz_id',
            'perfil_id'
        )->withTimestamps();
    }

}
