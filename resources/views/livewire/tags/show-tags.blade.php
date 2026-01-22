<div>
    <x-miscomponentes.base>

        <div class='flex flex-row justify-between items-center mb-2'>
            <x-input type='search' placeholder='Buscar...' wire:model.live='buscar'></x-input>
            @livewire('tags.create-tag')
        </div>
        <!-- Tabla moderna -->
        @if( $tags->count())
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg">
            <table class="w-full divide-y divide-gray-200">
                <!-- Cabecera -->
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 tracking-wide" wire:click='ordenar("id")'>
                            <i class='fas fa-sort mr-1'></i>ID Tag
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 tracking-wide" wire:click='ordenar("nombre")'>
                            <i class='fas fa-sort mr-1'></i>Nombre Tag
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 tracking-wide">
                            Color
                        </th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 tracking-wide">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody class="divide-y divide-gray-100">
                    @foreach ($tags as $item)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-5 text-sm font-medium text-gray-900">
                                {{ $item->id }}
                            </td>
                            <td class="px-6 py-5 text-sm text-gray-800 font-medium">
                                {{ $item->nombre }}
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-lg shadow-md flex items-center justify-center text-xs font-mono font-bold"
                                        style="background-color:{{ $item->color }}">
                                        <span class="text-white">{{ $item->color }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <div class="flex justify-center space-x-2">

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <x-miscomponentes.advertencia></x-miscomponentes.advertencia>
        @endif
    </x-miscomponentes.base>
</div>
