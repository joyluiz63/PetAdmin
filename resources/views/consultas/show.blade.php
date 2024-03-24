<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Pet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>



                    <p class="text-lg">
                        Exibindo Detalhes de Consulta
                    </p>

                </div>

                <div class="p-6 text-gray-900 flex flex-col items-center">
                    <p><strong>Consultou em: </strong>{{ date('d-m-Y', strtotime($consulta->realizada)) }}</p>
                    <p><strong>Clinica: </strong>{{$consulta->clinica}}</p>
                    <p><strong>Profissional: </strong>{{ $consulta->profissional }}</p>
                    <p><strong>Motivo: </strong>{{ $consulta->motivo }}</p>
                    <p><strong>Diagnostico: </strong>{{$consulta->diagnostico}}</p>
                    <p><strong>Conduta: </strong>{{ $consulta->conduta }}</p>
                </div>

                <div class="flex gap-4 justify-center">
                    <a href="{{route('consultas.meuPet', $consulta->pet_id)}}" class="bg-blue-500 text-white rounded p-2">Voltar</a>
                    <a href="{{route('consultas.edit', $consulta->id)}}" class="bg-purple-500 text-white rounded p-2"><i class="fa-solid fa-pen-to-square p-2"></i>Editar</a>
                    <form action="{{route('consultas.destroy', $consulta->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="pet_id" id="pet_id" value="{{ $consulta->pet_id}}">
                        <button type="submit" class="bg-red-500 text-white rounded p-2" onclick="return confirm('Tem certeza que deseja excluir o registro?')"><i class="fa-solid fa-trash p-2"></i>Excluir</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
