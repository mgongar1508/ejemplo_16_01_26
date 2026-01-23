<?php

namespace App\Livewire\Cursos;

use App\Livewire\Forms\Cursos\CreateCursoForm;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUserCurso extends Component
{
    use WithFileUploads;

    public bool $openCrear = false;
    public CreateCursoForm $cform;

    public function render()
    {
        $categorias = Category::select('id', 'nombre')->orderBy('nombre')->get();
        $tags = Tag::select('id', 'nombre')->orderBy('nombre')->get();
        return view('livewire.cursos.create-user-curso', compact('categorias', 'tags'));
    }

    public function crearCurso(){
        $this->cform->crearCursoForm();
        $this->cancelar();
        $this->dispatch('mensaje', 'Curso Creado');
        $this->dispatch('eventoCursoCreado')->to(ShowUserCursos::class);
    }

    public function cancelar(){
        $this->openCrear=false;
        $this->cform->cancelarForm();
    }
}
