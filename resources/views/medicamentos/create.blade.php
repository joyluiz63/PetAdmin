<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <p class="text-center font-bold">CADASTRO DE MEDICAMENTO PARA O PET {{ $pet->nome}}</p>
                    <form method="POST" action="{{ route('medicamentos.store', $pet->id) }}">
                        @csrf

                        <input type="hidden" id="pet_id" name="pet_id" value="{{ $pet->id}}">

                        <div class="grid grid-cols-3 gap-4 justify-items-center ">
                            <div class="w-full mb-4">
                                <label for="agendada" class="block mb-2 text-sm">Categoria:</label>
                                <select name="categoria"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                                    <option selected></option>
                                    <option value="Medicação">Medicação</option>
                                    <option value="Vermífugo">Vermífugo</option>
                                    <option value="Desparasitação">Desparasitação</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>

                            <div class="w-full mb-4">
                                <label for="nome" class="block mb-2 text-sm">Nome do Medicamento:</label>
                                <input type="text" id="nome" name="nome"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="dosagem" class="block mb-2 text-sm">Dosagem (Mg, Kg):</label>
                                <input type="text" id="dosagem" name="dosagem"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <fieldset>
                                    <legend>Uso:</legend>

                                    <input id="uso" class="peer/uso" type="radio" name="uso" value="Interno" checked />
                                    <label for="uso" class="peer-checked/uso:text-sky-500">Interno</label>

                                    <input id="published" class="peer/published" type="radio" name="uso" value="Externo" />
                                    <label for="published" class="peer-checked/published:text-sky-500">Externo</label>

                                  </fieldset>
                            </div>

                            <div class="w-full mb-4">
                                <label for="obs" class="block mb-2 text-sm">Observação:</label>
                                <input type="text" id="obs" name="obs"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="aplicado" class="block mb-2 text-sm">Aplicado em:</label>
                                <input type="date" id="aplicado" name="aplicado"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="repetir" class="block mb-2 text-sm">Repetir</label>
                                <input type="date" id="repetir" name="repetir"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>
                        </div>


                        <button type="submit"
                            class=" bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 py-1 rounded-lg mx-auto block shadow">
                            Cadastrar
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
