<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = Curso::factory(100)->create();
        $tags = Tag::pluck('id')->toArray();
        foreach($cursos as $curso){
            shuffle($tags);
            $curso->tag()->attach(self::getRandomTag($tags));
        }   
    }

    private static function getRandomTag(array $tags): array{
        $tagId = array_slice($tags, 0, random_int(1, count($tags)));
        return $tagId;
    }
}
