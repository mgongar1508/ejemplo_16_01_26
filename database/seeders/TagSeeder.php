<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etiquetas = [
            'Principiante' => '#10B981', // Verde
            'Intermedio' => '#3B82F6', // Azul
            'Avanzado' => '#EF4444', // Rojo
            'Certificacion' => '#8B5CF6', // Violeta
            'Actualizado' => '#F97316', // Naranja
        ];

        foreach($etiquetas as $nombre=>$color){
            Tag::create(compact('nombre', 'color'));
        }
    }
}
