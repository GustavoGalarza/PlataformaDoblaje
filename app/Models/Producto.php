<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $precio
 * @property $cantidad
 * @property $categoriaid
 * @property $created_at
 * @property $updated_at
 *
 * @property Categorium $categorium
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
     protected $table = 'producto';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'precio', 'cantidad', 'categoriaid'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorium()
    {
        return $this->belongsTo(\App\Models\Categorium::class, 'categoriaid', 'id');
    }
    
}
