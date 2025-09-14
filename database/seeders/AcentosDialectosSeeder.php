<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcentosDialecto;

class AcentosDialectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acentos = [
            // Nacionales - Bolivia
            ['nombre' => 'Cochabambino', 'descripcion' => 'Acento de Cochabamba, neutro y claro, usado en doblaje local.'],
            ['nombre' => 'La Paz', 'descripcion' => 'Acento de La Paz, pronunciación formal y característica local.'],
            ['nombre' => 'Santa Cruz', 'descripcion' => 'Acento suave y melodioso de Santa Cruz, adaptable a diversos personajes.'],
            ['nombre' => 'Tarijeño', 'descripcion' => 'Acento del sur de Bolivia, cálido y cercano.'],
            ['nombre' => 'Potosino', 'descripcion' => 'Acento profundo y marcado del altiplano, ideal para personajes serios.'],
            ['nombre' => 'Beniano', 'descripcion' => 'Acento profundo y marcado del altiplano, ideal para personajes serios.'],
            ['nombre' => 'Chuquisaqueño', 'descripcion' => 'Acento profundo y marcado del altiplano, ideal para personajes serios.'],
            ['nombre' => 'Pando', 'descripcion' => 'Acento profundo y marcado del altiplano, ideal para personajes serios.'],
            ['nombre' => 'Orureño', 'descripcion' => 'Acento profundo y marcado del altiplano, ideal para personajes serios.'],

            // Internacionales - Español
            ['nombre' => 'Español de España', 'descripcion' => 'Acento peninsular clásico, ideal para producciones internacionales.'],
            ['nombre' => 'Español de México', 'descripcion' => 'Acento neutro mexicano, usado ampliamente en doblaje latinoamericano.'],
            ['nombre' => 'Español de Argentina', 'descripcion' => 'Acento rioplatense, con entonación característica.'],
            ['nombre' => 'Español neutro', 'descripcion' => 'Acento neutro estándar, ampliamente usado en doblaje profesional.'],
            ['nombre' => 'Español de Colombia', 'descripcion' => 'Acento claro y neutral, fácil de entender para público latinoamericano.'],

            // Internacionales - Otros idiomas
            ['nombre' => 'Inglés británico', 'descripcion' => 'Pronunciación estándar del Reino Unido, usado en doblaje y locución.'],
            ['nombre' => 'Inglés americano', 'descripcion' => 'Pronunciación general estadounidense, neutra para doblaje y narraciones.'],
            ['nombre' => 'Francés', 'descripcion' => 'Pronunciación estándar francesa, elegante y clara.'],
            ['nombre' => 'Alemán', 'descripcion' => 'Pronunciación estándar alemana, precisa y fuerte.'],
            ['nombre' => 'Italiano', 'descripcion' => 'Pronunciación italiana clara, musical y expresiva.'],
            ['nombre' => 'Portugués de Brasil', 'descripcion' => 'Acento brasileño, usado en doblaje de producciones lusófonas.'],
            ['nombre' => 'Portugués europeo', 'descripcion' => 'Acento de Portugal, formal y claro.'],
            ['nombre' => 'Ruso', 'descripcion' => 'Pronunciación clara y firme, usada en doblaje de personajes internacionales.'],
            ['nombre' => 'Chino mandarín', 'descripcion' => 'Pronunciación estándar mandarín, neutra para doblaje y locución.'],
            ['nombre' => 'Japonés', 'descripcion' => 'Pronunciación clara y suave, usada en anime y doblaje profesional.'],
            ['nombre' => 'Coreano', 'descripcion' => 'Pronunciación estándar coreana, usada en doblaje y subtitulaje.'],

            // Acentos regionales internacionales
            ['nombre' => 'Inglés australiano', 'descripcion' => 'Acento australiano, distintivo y reconocible.'],
            ['nombre' => 'Inglés irlandés', 'descripcion' => 'Acento irlandés, melódico y particular.'],
            ['nombre' => 'Inglés escocés', 'descripcion' => 'Acento escocés fuerte, usado en doblaje de personajes particulares.'],
            ['nombre' => 'Español chileno', 'descripcion' => 'Acento característico de Chile, con entonación particular.'],
            ['nombre' => 'Español peruano', 'descripcion' => 'Acento peruano claro y neutro, fácil de entender para doblaje.'],
        ];

        foreach ($acentos as $acento) {
            AcentosDialecto::create($acento);
        }
    }
}
