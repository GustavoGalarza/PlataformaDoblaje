<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RangoVocal;

class RangoVocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rangos = [
            // Voces masculinas
            ['nombre' => 'Bajo profundo', 'descripcion' => 'Registro masculino muy grave, ideal para personajes solemnes, villanos o narraciones oscuras.'],
            ['nombre' => 'Bajo-barítono', 'descripcion' => 'Grave con cierta versatilidad, usado en doblaje de personajes maduros o autoritarios.'],
            ['nombre' => 'Barítono', 'descripcion' => 'El rango más común en voces masculinas, equilibrado entre graves y agudos.'],
            ['nombre' => 'Tenor', 'descripcion' => 'Registro agudo masculino, expresivo y enérgico, ideal para protagonistas jóvenes.'],
            ['nombre' => 'Contratenor', 'descripcion' => 'Muy agudo para voz masculina, usado en personajes peculiares o fantásticos.'],

            // Voces femeninas
            ['nombre' => 'Contralto', 'descripcion' => 'Registro femenino más grave, profundo y cálido.'],
            ['nombre' => 'Mezzosoprano', 'descripcion' => 'Versátil, intermedio entre contralto y soprano, muy usado en doblaje.'],
            ['nombre' => 'Soprano lírica', 'descripcion' => 'Agudo, brillante y melodioso, ideal para personajes femeninos protagonistas.'],
            ['nombre' => 'Soprano ligera', 'descripcion' => 'Agudísimo y ágil, usado para personajes tiernos, jóvenes o mágicos.'],

            // Voces infantiles y neutras
            ['nombre' => 'Infantil agudo', 'descripcion' => 'Estilo de voz aniñado, muy agudo, usado en personajes de niños pequeños.'],
            ['nombre' => 'Infantil medio', 'descripcion' => 'Tono intermedio, usado para doblar personajes de niños y adolescentes.'],

            // Voces especiales
            ['nombre' => 'Voz Madura','descripcion' => 'Voces de personajes adultos mayores o con experiencia, serias y profundas.',],
            ['nombre' => 'Juvenil masculino', 'descripcion' => 'Registro intermedio para doblaje de adolescentes varones.'],
            ['nombre' => 'Juvenil femenino', 'descripcion' => 'Registro intermedio para doblaje de adolescentes mujeres.'],
            ['nombre' => 'Neutro medio', 'descripcion' => 'Rango equilibrado y versátil, adaptable a diversos estilos de doblaje.'],
        ];

        foreach ($rangos as $rango) {
            RangoVocal::create($rango);
        }
    }
}
