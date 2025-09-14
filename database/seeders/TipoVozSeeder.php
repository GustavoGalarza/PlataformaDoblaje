<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoVoz;

class TipoVozSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposVoz = [
            // Clasificación general por género
            ['nombre' => 'Masculina', 'descripcion' => 'Voz masculina general, adaptable a distintos contextos.'],
            ['nombre' => 'Femenina', 'descripcion' => 'Voz femenina general, adaptable a distintos contextos.'],

            // Variantes neutras y profesionales
            ['nombre' => 'Neutra', 'descripcion' => 'Voz sin acento marcado, utilizada en doblaje internacional.'],
            ['nombre' => 'Juvenil', 'descripcion' => 'Voz fresca y joven, sin llegar a ser infantil.'],
            ['nombre' => 'Infantil', 'descripcion' => 'Voces de niños o imitaciones de ellas.'],
            ['nombre' => 'Anciana', 'descripcion' => 'Voces de adultos mayores, sabias o frágiles.'],

            // Clasificación en doblaje profesional
            ['nombre' => 'Institucional', 'descripcion' => 'Voz seria y formal, para anuncios y corporativos.'],
            ['nombre' => 'Publicitaria', 'descripcion' => 'Voz expresiva, clara y persuasiva, para comerciales.'],
            ['nombre' => 'Narrativa', 'descripcion' => 'Voz diseñada para narración de documentales o audiolibros.'],
            ['nombre' => 'Caricaturesca', 'descripcion' => 'Voz exagerada o creativa para animaciones.'],
            ['nombre' => 'Fantástica', 'descripcion' => 'Voces adaptadas a personajes mágicos o ficticios.'],
            ['nombre' => 'Doblaje General', 'descripcion' => 'Tipo estándar para interpretar cualquier personaje.'],
        ];

        foreach ($tiposVoz as $tipo) {
            TipoVoz::create($tipo);
        }
    }
}
