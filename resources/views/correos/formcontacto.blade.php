<x-app-layout>
    <x-miscomponentes.base>
        <div class=" bg-gray-100 lg:px-8 flex items-center justify-center">
            <div class="max-w-md w-full bg-white rounded-2xl p-4 shadow-xl border border-gray-100">

                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900">Contacto</h2>
                    <p class="text-gray-500 mt-2">Nos encantaría saber de ti</p>
                </div>

                <form action="{{ route('contacto.send') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" id="nombre" name="nombre" value = "{{ @old('nombre') }}"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm transition-all"
                                placeholder="Ej. Juan Pérez">
                        </div>
                    </div>
                    <x-input-error for='nombre'></x-input-error>
                    @guest
                    <div>
                        <label for="mail" class="block text-sm font-medium text-gray-700 mb-1">Correo
                            Electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" value = "{{ @old('email') }}"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm transition-all"
                                placeholder="tu@email.com">
                        </div>
                    </div>
                    <x-input-error for='email'></x-input-error>
                    @endguest

                    <div>
                        <label for="comentario" class="block text-sm font-medium text-gray-700 mb-1">Comentarios</label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <i class="fas fa-comment-dots text-gray-400"></i>
                            </div>
                            <textarea id="comentario" name="comentario" rows="4" required
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm transition-all"
                                placeholder="¿En qué podemos ayudarte?">{{@old('comentario')}}</textarea>
                        </div>
                    </div>
                    <x-input-error for='comentario'></x-input-error>

                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button type="submit"
                            class="flex-1 justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            <i class="fas fa-paper-plane mr-2"></i> Enviar mensaje
                        </button>

                        <a href="/"
                            class="flex-1 inline-flex justify-center items-center py-3 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </x-miscomponentes.base>
</x-app-layout>
