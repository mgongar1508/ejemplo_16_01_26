<?php

namespace App\Livewire\Forms\Cursos;

use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class CreateCursoForm extends Form
{   
    #[Validate('required', 'string', 'min:3', 'max:150', 'unique:cursos,nombre')]
    public string $nombre = '';

    #[Validate('required', 'string', 'min:3', 'max:500')]
    public string $descripcion = '';

    #[Validate('required', 'enum', ['SI', 'NO'])]
    public string $disponible = '';

    #[Validate('required', 'int', 'exists:categories,id')]
    public int $category_id = 0;

    #[Validate('required', 'image', 'nullable', 'max:2048')]
    public ?TemporaryUploadedFile $imagen = null;

    #[Validate('required', 'array', 'exists:tags,id')]
    public array $tags =[];

    public function crearCursoForm(){
        $datos = $this->validate(); //valida y guarda en la variable datos
        $datos['user_id']=Auth::id();
        $datos['imagen'] = $this->imagen?->store('imagenes/cursos') ?? 'imagenes/cursos/noImage.jpg';
        $curso = Curso::create($datos); //crea el curso sin problemas y tambien lo guarda en una variable
        $curso->tags()->attach($this->tags); //asigna las tags
    }

    public function cancelarForm(){
        $this->resetValidation();
        $this->reset();
    }
}
