<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <p class="text-center font-bold">EDIÇÃO DE USUÁRIOS</p>
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4 justify-items-center ">
                            <div class="w-full mb-4">
                                <label for="nome" class="block mb-2 text-sm">Nome</label>
                                <input type="text" id="nome" name="nome" value="{{ $user->name }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>

                            <div class="w-full mb-4">
                                <label for="nome" class="block mb-2 text-sm">Nível de permissão</label>
                                <select name="level"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                                    <option selected>{{ $user->level }}</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
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
