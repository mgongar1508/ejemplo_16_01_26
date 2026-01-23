<x-miscomponentes.base>
    <div class="flex flex-row items-center mb-2">
        <x-input type="search" wire:model.live='texto' placeholder='Buscar...'></x-input>
    </div>
    @if($cursos->count())
    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900" wire:click='ordenar("nombre")'>
                        <i class='fas fa-sort mr-1'></i>Curso</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900" wire:click='ordenar("descripcion")'>
                        <i class='fas fa-sort mr-1'></i>Descripción</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900" wire:click='ordenar("categoria")'>
                        <i class='fas fa-sort mr-1'></i>Categoría</th>
                    <th scope="col" class="px-6 py-4 font-medium flex text-gray-900" wire:click='ordenar("disponible")'>
                        <i class='fas fa-sort mr-1'></i>Disponible</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Etiquetas</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($cursos as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                        <div class="relative h-12 w-12 flex-shrink-0">
                            <img class="h-full w-full rounded-full object-cover object-center ring-2 ring-gray-100"
                                src="{{ Storage::url($item->imagen) }}"
                                alt="Curso Thumbnail" />
                        </div>
                        <div class="text-sm">
                            <div class="font-bold text-gray-700">{{$item->nombre}}</div>
                        </div>
                    </th>

                    <td class="px-6 py-4">
                        <p class="line-clamp-2 max-w-xs text-xs">{{ $item->descripcion }}.</p>
                    </td>

                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-bold" style="color:{{ $item->color }}">
                            {{ $item->cnombre }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <span
                            @class([
                                "inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold",
                                "text-red-500 bg-red-100"=>$item->disponible == 'NO',
                                "text-green-500 bg-green-100" => $item->disponible == 'SI'
                            ])>
                            {{ $item->disponible }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <ul class="flex flex-wrap gap-1 list-none p-0">
                            @foreach ($item->tags as $tag)
                                <li>
                                    <span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-[10px] uppercase font-bold tracking-wider">
                                        {{$tag->nombre}}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">
                            <button title="Editar" class="text-blue-600 hover:text-blue-900 transition-colors">
                                <i class="fa-solid fa-pen-to-square text-lg"></i>
                            </button>
                            <button title="Borrar" class="text-red-600 hover:text-red-900 transition-colors">
                                <i class="fa-solid fa-trash text-lg"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class='mt-1'>
        {{ $cursos->links() }}
    </div>
    @else
        <x-miscomponentes.advertencia></x-miscomponentes.advertencia>
    @endif
</x-miscomponentes.base>
