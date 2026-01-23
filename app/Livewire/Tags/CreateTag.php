<?php

namespace App\Livewire\Tags;

use App\Livewire\Forms\Tags\CreateTagForm;
use Livewire\Component;

class CreateTag extends Component
{
    public bool $openCrear=false;
    public CreateTagForm $cform;
    public function render()
    {
        return view('livewire.tags.create-tag');
    }

    public function crearTag(){
        $this->cform->crearForm();
        $this->cancelar();
        $this->dispatch('evtTagCreado')->to(ShowTags::class);
        $this->dispatch('mensaje', 'Etiqueta Creada');
    }
    public function cancelar(){
        $this->openCrear=false;
        $this->cform->cancelarForm();
    }
}