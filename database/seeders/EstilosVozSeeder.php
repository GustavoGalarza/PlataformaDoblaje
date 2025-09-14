<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EstilosVoz;

class EstilosVozSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estilos = [
            // Estilos narrativos
            ['nombre' => 'Narrativo', 'descripcion' => 'Estilo ideal para documentales, audiolibros y relatos.'],
            ['nombre' => 'Institucional', 'descripcion' => 'Serio, formal y corporativo, para mensajes oficiales.'],
            ['nombre' => 'Didáctico', 'descripcion' => 'Claro y pedagógico, para material educativo o e-learning.'],

            // Estilos dramáticos
            ['nombre' => 'Dramático', 'descripcion' => 'Interpretación cargada de emociones intensas.'],
            ['nombre' => 'Épico', 'descripcion' => 'Estilo heroico y solemne, usado en tráilers o narraciones grandiosas.'],
            ['nombre' => 'Misterioso', 'descripcion' => 'Tono enigmático, ideal para suspenso y thrillers.'],
            ['nombre' => 'Trágico', 'descripcion' => 'Expresivo y desgarrador, transmite sufrimiento.'],

            // Estilos ligeros y cómicos
            ['nombre' => 'Cómico', 'descripcion' => 'Divertido, exagerado o humorístico.'],
            ['nombre' => 'Caricaturesco', 'descripcion' => 'Voces graciosas y exageradas, usadas en animación.'],
            ['nombre' => 'Paródico', 'descripcion' => 'Imitación humorística de estilos o personajes.'],

            // Estilos publicitarios
            ['nombre' => 'Publicitario', 'descripcion' => 'Expresivo y persuasivo, usado en comerciales.'],
            ['nombre' => 'Juvenil Moderno', 'descripcion' => 'Cercano, fresco, ideal para conectar con jóvenes.'],
            ['nombre' => 'Elegante', 'descripcion' => 'Sofisticado, calmado y persuasivo para marcas premium.'],
            ['nombre' => 'Sensual', 'descripcion' => 'Estilo seductor y atractivo, usado en publicidad y ficción.'],

            // Estilos animados y fantásticos
            ['nombre' => 'Fantástico', 'descripcion' => 'Ideal para personajes mágicos, de ciencia ficción o irreales.'],
            ['nombre' => 'Villanesco', 'descripcion' => 'Oscuro y malévolo, para antagonistas.'],
            ['nombre' => 'Heroico', 'descripcion' => 'Estilo valiente y noble, usado en protagonistas.'],
            ['nombre' => 'Infantil', 'descripcion' => 'Tierno, inocente, usado en voces de niños o personajes pequeños.'],
        ];

        foreach ($estilos as $estilo) {
            EstilosVoz::create($estilo);
        }
    }
}
