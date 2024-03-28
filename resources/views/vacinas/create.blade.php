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
                    <p class="text-center font-bold">CADASTRO DE VACINA PARA O PET {{ $pet->nome}}</p>
                    <form method="POST" action="{{ route('vacinas.store', $pet->id) }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="pet_id" name="pet_id" value="{{ $pet->id}}">

                        <div class="grid grid-cols-3 gap-4 justify-items-center ">
                            <div class="w-full mb-4">
                                <label for="agendada" class="block mb-2 text-sm">Agendado para:</label>
                                <input type="date" id="agendada" name="agendada"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="aplicada" class="block mb-2 text-sm">Aplicado em::</label>
                                <input type="date" id="aplicada" name="aplicada"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="clinica" class="block mb-2 text-sm">Clínica:</label>
                                <input type="text" id="clinica" name="clinica"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="nome" class="block mb-2 text-sm">Vacina:</label>
                                <input type="text" id="nome" name="nome"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="dose" class="block mb-2 text-sm">Dose:</label>
                                <input type="number" id="dose" name="dose"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="doenca" class="block mb-2 text-sm">Doença(s)</label>
                                <input type="text" id="doenca" name="doenca"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div>
                                <label class="lbl">Etiqueta</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                name="image" type="file"/>
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
