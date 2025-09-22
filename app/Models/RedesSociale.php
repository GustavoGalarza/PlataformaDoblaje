<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RedesSociale
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $icono
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RedesSociale extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripcion', 'icono'];
public function perfiles()
{
    return $this->belongsToMany(\App\Models\Perfile::class, 'perfil_redes_sociales', 'red_social_id', 'perfil_id')
                ->withPivot('link')
                ->withTimestamps();
}


}
