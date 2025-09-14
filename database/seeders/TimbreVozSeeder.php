<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimbreVoz;

class TimbreVozSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timbres = [
            ['nombre' => 'Clara', 'descripcion' => 'Timbre brillante, ligero, ideal para voces femeninas juveniles o personajes alegres.'],
            ['nombre' => 'Oscura', 'descripcion' => 'Timbre profundo y serio, usado en narraciones, antagonistas o personajes maduros.'],
            ['nombre' => 'Rasposa', 'descripcion' => 'Timbre áspero o rasgado, aporta personalidad, rudeza o comedia a la voz.'],
            ['nombre' => 'Suave', 'descripcion' => 'Timbre delicado, cálido y apacible, usado para personajes tiernos o infantiles.'],
            ['nombre' => 'Metalizada', 'descripcion' => 'Timbre con resonancia metálica, ideal para personajes robóticos, fantásticos o mágicos.'],
            ['nombre' => 'Grave', 'descripcion' => 'Timbre bajo y sólido, usado en villanos, narradores o personajes serios masculinos.'],
            ['nombre' => 'Aguda', 'descripcion' => 'Timbre alto y brillante, usado para personajes jóvenes, niñas o animales en animación.'],
            ['nombre' => 'Neutral', 'descripcion' => 'Timbre equilibrado, versátil, adecuado para cualquier tipo de doblaje profesional.'],
            ['nombre' => 'Expresiva', 'descripcion' => 'Timbre dinámico que permite transmitir emociones amplias, ideal para actuación dramática o cómica.'],
            ['nombre' => 'Sedosa', 'descripcion' => 'Timbre suave y aterciopelado, perfecto para narraciones, voces femeninas adultas o comerciales.'],
            ['nombre' => 'Afilada', 'descripcion' => 'Timbre penetrante, claro, usado en antagonistas, personajes enojados o escenas de tensión.'],
            ['nombre' => 'Bronca', 'descripcion' => 'Timbre áspero y grave, ideal para voces masculinas rudas o personajes robustos.'],
            ['nombre' => 'Ligera', 'descripcion' => 'Timbre liviano, ágil, común en voces juveniles, infantiles o animaciones dinámicas.'],
            ['nombre' => 'Cálida', 'descripcion' => 'Timbre con calidez y suavidad, transmite cercanía y confianza.'],
            ['nombre' => 'Metálica', 'descripcion' => 'Timbre con resonancia metálica, usado en efectos especiales o personajes fantásticos.'],
            ['nombre' => 'Neutra', 'descripcion' => 'Timbre equilibrado y natural, muy usado en comerciales y narraciones.'],
            ['nombre' => 'Áspera', 'descripcion' => 'Timbre con rugosidad, da fuerza a personajes rudos o cómicos.'],
            ['nombre' => 'Profunda', 'descripcion' => 'Timbre con resonancia profunda, adecuado para voces de autoridad o villanos.'],
            ['nombre' => 'Juguetona', 'descripcion' => 'Timbre alegre, infantil o caricaturesco, ideal para animación.'],
            ['nombre' => 'Dramática', 'descripcion' => 'Timbre intenso y cargado de emoción, usado en escenas de gran impacto emocional.'],
            ['nombre' => 'Cálida suave', 'descripcion' => 'Timbre delicado y cercano, muy usado en narraciones y comerciales.'],
            ['nombre' => 'Enérgica', 'descripcion' => 'Timbre vibrante y potente, perfecto para escenas de acción o motivacionales.'],
            ['nombre' => 'Sutil', 'descripcion' => 'Timbre discreto, elegante, para personajes secundarios o narraciones pausadas.'],
        ];

        foreach ($timbres as $timbre) {
            TimbreVoz::create($timbre);
        }
    }
}
