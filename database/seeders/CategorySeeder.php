<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Programacion'        => '#1E40AF', // Azul
            'Diseno Gráfico'      => '#9333EA', // Morado
            'Marketing Digital'   => '#F59E0B', // Ámbar
            'Negocios y Finanzas' => '#047857', // Verde oscuro
            'Desarrollo Personal' => '#DC2626', // Rojo
        ];

        foreach($categorias as $nombre=>$color){
            Category::create(compact('nombre', 'color'));
        }
    }
}
