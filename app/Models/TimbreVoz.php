<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TimbreVoz
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
class TimbreVoz extends Model
{
    protected $table = 'timbre_voz';
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
            'perfil_timbre_voz',
            'timbre_voz_id',
            'perfil_id'
        )->withTimestamps();
    }

}
