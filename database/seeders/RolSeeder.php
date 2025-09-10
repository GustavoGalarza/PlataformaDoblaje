<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['nombre' => 'Admin', 'descripcion' => 'Usuario administrador'],
            ['nombre' => 'Usuario', 'descripcion' => 'Usuario normal'],
            ['nombre' => 'Directora', 'descripcion' => 'Directora de proyecto'],
            ['nombre' => 'Estudiante', 'descripcion' => 'Usuario estudiante'],
        ];

        foreach ($roles as $rol) {
            Rol::create($rol);
        }
    }
}
