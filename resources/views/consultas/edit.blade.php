<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de Consultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <form method="POST" action="{{ route('consultas.update', $consulta->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-3 gap-4 justify-items-center ">
                            <div class="w-full mb-4">
                                <label for="agendada" class="block mb-2 text-sm">Agendadao para:</label>
                                <input type="date" id="agendada" name="agendada" value="{{ $consulta->agendada }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="realizada" class="block mb-2 text-sm">Consultou em:</label>
                                <input type="date" id="realizada" name="realizada" value="{{ $consulta->realizada }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="clinica" class="block mb-2 text-sm">Clinica:</label>
                                <input type="text" id="clinica" name="clinica" value="{{ $consulta->clinica }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="profissional" class="block mb-2 text-sm">Profissional:</label>
                                <input type="text" id="profissional" name="profissional" value="{{ $consulta->profissional }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="motivo" class="block mb-2 text-sm">Motivo da Consulta:</label>
                                <input type="text" id="motivo" name="motivo" value="{{ $consulta->motivo }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="diagnostico" class="block mb-2 text-sm">Diagnostico:</label>
                                <input type="text" id="diagnostico" name="diagnostico" value="{{ $consulta->diagnostico }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div class="w-full mb-4">
                                <label for="conduta" class="block mb-2 text-sm">Conduta:</label>
                                <input type="text" id="conduta" name="conduta" value="{{ $consulta->conduta }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
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
