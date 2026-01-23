<div>
    <button class='p-2 rounded-lg text-white bg-indigo-500 hover:bg-indigo-700' wire:click='$set("openCrear", true)'>
        <i class='fas fa-add mr-1'></i>NUEVO
    </button>
    <x-dialog-modal maxWidth="2xl" wire:model='openCrear'>
        <x-slot name='title'>Crear Curso</x-slot>
        <x-slot name='content'>
            <x-label value='Nombre' for='nombre' class='mb-1'></x-label>
            <x-input type='text' class='w-full mb-4' id='nombre' wire:model='cform.nombre'></x-input>
            <x-input-error for='cform.nombre'></x-input-error>

            <x-label value='Descripcion' for='descripcion' class='mb-1'></x-label>
            <textarea class='w-full rounded-lg' id='descripcion' wire:model='cform.descripcion'></textarea>
            <x-input-error for='cform.descripcion'></x-input-error>

            <x-label value='Categoria' for='categoria' class='mb-1'></x-label>
            <select name='categoria' class='w-full mb-4 rounded-lg' id='categoria' wire:model='cform.category_id'>
                <option value="">Selecciona una categoria</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
            <x-input-error for='cform.category_id'></x-input-error>

            <x-label value='Disponible' for='disponible' class='mb-1'></x-label>
            <div class="flex items-center gap-2 mb-4">
                <input type="radio" name="opcion" value="SI" wire:model='cform.disponible'
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                <span class="ml-2 text-sm font-medium text-gray-900">Si</span>

                <input type="radio" name="opcion" value="NO" wire:model='cform.disponible'
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                <span class="ml-2 text-sm font-medium text-gray-900">No</span>
            </div>
            <x-input-error for='cform.disponible'></x-input-error>

            <x-label value='Etiquetas' for='etiquetas' class='mb-1'></x-label>
            <div class="flex items-center gap-6 mb-4">
                @foreach($tags as $tag)
                <label class="flex items-center cursor-pointer group">
                    <input type="checkbox" value="{{ $tag->id }}" wire:model='cform.tags'
                        class="w-5 h-5 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 focus:ring-2 cursor-pointer transition">
                    <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-blue-600">{{$tag->nombre}}</span>
                </label>
                @endforeach
            </div>
            <x-input-error for='cform.tags'></x-input-error>

            <x-label value='Imagen' for='imagen' class='mb-1'></x-label>
            <div class='w-full h-80 rounded-lg bg-gray-200 relative'>
                <input type='file' class='hidden' id='cimagen' accept='image/*' wire:model='cform.imagen'/>
                <label for='cimagen' wire:loading.class='opacity-50 pointer-event-none cursor-not-allowed' wire:target='cform.imagen'
                 class='text-white absolute bottom-2 right-2 p-2 rounded-lg bg-indigo-500 hover:bg-indigo-700'>
                    <i class='fas fa-upload mr-1'></i>
                    <span>Subir</span>
                    
                </label>
                 @if ($cform->imagen)
                    <img src="{{ $cform->imagen->temporaryUrl() }}"
                        class="w-full h-full object-cover object-center bg-no-repeat" />
                @endif
            </div>
            <x-input-error for='cform.imagen'></x-input-error>
        </x-slot>
        <x-slot name='footer'>
            <div class="flex mt-4 flex-row-reverse w-full">
                <button type="submit" wire:click='crearCurso' wire:loading.attr='disable' class="p-2 rounded-lg font-bold bg-green-500 hover:bg-green-700 text-white">
                    <i class="fas fa-save mr-1"></i>GUARDAR
                </button>

                <a href="{{ route('categories.index') }}" wire:click='cancelar'
                    class="mr-2 p-2 rounded-lg font-bold bg-red-500 hover:bg-red-700 text-white">
                    <i class="fas fa-xmark mt-1"></i>CANCELAR
                </a>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
