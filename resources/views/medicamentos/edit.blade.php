<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de Medicamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <form method="POST" action="{{ route('medicamentos.update', $medicamento->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-3 gap-4 justify-items-center ">
                            <div class="w-full mb-4">
                                <label for="agendada" class="block mb-2 text-sm">Categoria:</label>
                                <select name="categoria"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                                    <option selected>{{ $medicamento->categoria}}</option>
                                    <option value="Medicação">Medicação</option>
                                    <option value="Vermífugo">Vermífugo</option>
                                    <option value="Desparasitação">Desparasitação</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>

                            <div class="w-full mb-4">
                                <label for="nome" class="block mb-2 text-sm">Nome do Medicamento:</label>
                                <input type="text" id="nome" name="nome" value="{{ $medicamento->nome}}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="dosagem" class="block mb-2 text-sm">Dosagem</label>
                                <input type="text" id="dosagem" name="dosagem" value="{{ $medicamento->dosagem}}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    >
                            </div>

                            <div class="w-full mb-4">
                                <fieldset>
                                    <legend>Uso:</legend>

                                    <input id="uso" type="radio" name="uso" value="Interno" {{ old('uso', $medicamento->uso) == 'Interno' ? 'checked' : '' }} />
                                    <label for="uso" >Interno</label>

                                    <input id="uso" type="radio" name="uso" value="Externo" {{ old('uso', $medicamento->uso) == 'Externo' ? 'checked' : '' }} />
                                    <label for="uso">Externo</label>

                                  </fieldset>
                            </div>

                            <div class="w-full mb-4">
                                <label for="obs" class="block mb-2 text-sm">Observação:</label>
                                <input type="text" id="obs" name="obs" value="{{ $medicamento->obs}}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="aplicado" class="block mb-2 text-sm">Aplicado em:</label>
                                <input type="date" id="aplicado" name="aplicado" value="{{ $medicamento->aplicado}}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="repetir" class="block mb-2 text-sm">Repetir( em dias)</label>
                                <input type="number" id="repetir" name="repetir" value="{{ $medicamento->repetir}}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Em dias">
                            </div>
                        </div>


                        <button type="submit"
                            class=" bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 py-1 rounded-lg mx-auto block shadow">
                            Atualizar
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
