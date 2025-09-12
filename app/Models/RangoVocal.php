<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RangoVocal
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
class RangoVocal extends Model
{
    protected $table = 'rango_vocal';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripcion'];


}
