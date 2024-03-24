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
                    <p class="text-center font-bold">CADASTRO DE PET</p>
                    <form method="POST" action="{{ route('pets.store') }}">
                        @csrf
                        <div class="grid grid-cols-3 gap-4 justify-items-center ">
                            <div class="w-full mb-4">
                                <label for="nome" class="block mb-2 text-sm">Nome</label>
                                <input type="text" id="nome" name="nome"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="especie" class="block mb-2 text-sm">Espécie</label>
                                <select name="especie"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                                    <option selected></option>
                                    <option value="cão">Cão</option>
                                    <option value="gato">Gato</option>
                                    <option value="pássaro">Pássaro</option>
                                    <option value="peixe">Peixe</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>

                            <div class="w-full mb-4">
                                <label for="raca" class="block mb-2 text-sm">Raça</label>
                                <input type="text" id="raca" name="raca"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="cor" class="block mb-2 text-sm">Côr</label>
                                <input type="text" id="cor" name="cor"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="mb-4 mt-6 grid grid-cols-4 px-4 py-1 border rounded-lg border-black">
                                <label for="sexo" class="block mb-2 px-2 text-sm">Masculino</label>
                                <input type="radio" id="sexo" name="sexo" value="M" checked
                                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                <label for="sexo" class="block mb-2 px-2 text-sm">Feminino</label>
                                <input type="radio" id="sexo" name="sexo" value="F"
                                    class="px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">

                            </div>

                            <div class="w-full mb-4">
                                <label for="nascimento" class="block mb-2 text-sm">Data de Nascimento</label>
                                <input type="date" id="nascimento" name="nascimento"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="tutor" class="block mb-2 text-sm">Tutor Humano</label>
                                <input type="text" id="tutor" name="tutor"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>
                        </div>
                        <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">

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
