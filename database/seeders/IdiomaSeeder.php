<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Idioma;

class IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $idiomas = [
            // 🌍 Español en el doblaje
            ['nombre' => 'Español Neutro'],   
            ['nombre' => 'Español México'],   
            ['nombre' => 'Español España'],
            ['nombre' => 'Español Argentina'],
            ['nombre' => 'Español Chile'],
            ['nombre' => 'Español Colombia'],
            ['nombre' => 'Castellano'],


            // 🌍 Idiomas internacionales clave
            ['nombre' => 'Inglés'],
            ['nombre' => 'Portugués Brasil'],
            ['nombre' => 'Portugués Portugal'],
            ['nombre' => 'Francés'],
            ['nombre' => 'Italiano'],
            ['nombre' => 'Alemán'],
            ['nombre' => 'Chino Mandarín'],
            ['nombre' => 'Japonés'],
            ['nombre' => 'Coreano'],
            ['nombre' => 'Ruso'],
            ['nombre' => 'Árabe'],

            // 🇧🇴 Idiomas de Bolivia (más representativos)
            ['nombre' => 'Quechua'],
            ['nombre' => 'Aymara'],
            ['nombre' => 'Guaraní'],
            ['nombre' => 'Moxeño-Trinitario'],
            ['nombre' => 'Chiquitano'],
            ['nombre' => 'Bésiro'],
            ['nombre' => 'Weenhayek'],
            ['nombre' => 'Yuracaré'],
            ['nombre' => 'Tacana'],
            ['nombre' => 'Itonama'],
            ['nombre' => 'Leco'],
            ['nombre' => 'Mojeño-Ignaciano'],
            ['nombre' => 'Baure'],
            ['nombre' => 'Cavineño'],
            ['nombre' => 'Araona'],
            ['nombre' => 'Uru-Chipaya'],
            ['nombre' => 'Guarasu’we'],
            ['nombre' => 'Machineri'],
            ['nombre' => 'Pacahuara'],
            ['nombre' => 'Sirionó'],
            ['nombre' => 'Yaminawa'],
            ['nombre' => 'Esse Ejja'],
        ];

        foreach ($idiomas as $idioma) {
            Idioma::create($idioma);
        }
    }
}
