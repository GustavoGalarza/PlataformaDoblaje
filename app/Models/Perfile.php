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
    // Relación muchos a muchos con Idioma
    public function idiomas()
    {
        return $this->belongsToMany(
            \App\Models\Idioma::class,  // Modelo relacionado
            'perfil_idioma',           // Tabla pivot
            'perfil_id',               // FK de este modelo en la tabla pivot
            'idioma_id'                // FK del modelo relacionado en la tabla pivot
        )->withTimestamps();
    }
    public function tiposVoz()
    {
        return $this->belongsToMany(\App\Models\TipoVoz::class, 'perfil_tipo_voz', 'perfil_id', 'tipo_voz_id')->withTimestamps();
    }

    public function estilosVoz()
    {
        return $this->belongsToMany(
            \App\Models\EstilosVoz::class,   // Modelo relacionado
            'perfil_estilos_voz',           // Tabla pivot
            'perfil_id',                    // FK en la tabla pivot hacia Perfile
            'estilo_voz_id'                 // FK en la tabla pivot hacia EstilosVoz
        )->withTimestamps();
    }

    public function rangosVocales()
    {
        return $this->belongsToMany(
            \App\Models\RangoVocal::class,
            'perfil_rango_vocal',
            'perfil_id',
            'rango_vocal_id'
        )->withTimestamps();
    }

    public function timbresVoz()
    {
        return $this->belongsToMany(
            \App\Models\TimbreVoz::class,
            'perfil_timbre_voz',
            'perfil_id',
            'timbre_voz_id'
        )->withTimestamps();
    }
    // Relación muchos a muchos con Acentos/Dialectos
    public function acentosDialectos()
    {
        return $this->belongsToMany(
            \App\Models\AcentosDialecto::class,  // Modelo relacionado
            'perfil_acento_dialecto',            // Tabla pivot
            'perfil_id',                          // FK de este modelo en la tabla pivot
            'acento_dialecto_id'                  // FK del modelo relacionado en la tabla pivot
        )->withTimestamps();
    }

    public function redesSociales()
    {
        return $this->belongsToMany(\App\Models\RedesSociale::class, 'perfil_redes_sociales', 'perfil_id', 'red_social_id')
            ->withPivot('link')
            ->withTimestamps();
    }

    public function demos()
    {
        return $this->hasMany(\App\Models\Demo::class, 'perfil_id', 'id_perfil');
    }

}
