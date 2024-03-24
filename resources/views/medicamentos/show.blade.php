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
                        Exibindo Detalhes do Medicamento {{$medicamento->nome . " - Código: ". $medicamento->id}}
                    </p>

                </div>

                <div class="p-6 text-gray-900 flex flex-col items-center">
                    <p><strong>Categoria: </strong>{{$medicamento->categoria}}</p>
                    <p><strong>Nome: </strong>{{$medicamento->nome}}</p>
                    <p><strong>Dosagem: </strong>{{ $medicamento->dosagem }}</p>
                    <p><strong>Uso: </strong>{{ $medicamento->uso }}</p>
                    <p><strong>Observação: </strong>{{$medicamento->obs}}</p>
                    <p><strong>Aplicado em: </strong>{{ date('d-m-Y', strtotime($medicamento->aplicado)) }}</p>
                    <p><strong>Repetir em: </strong>{{$medicamento->repetir }} dias</p>

                </div>

                <div class="flex gap-4 justify-center">
                    <a href="{{route('medicamentos.meuPet', $medicamento->pet_id)}}" class="bg-blue-500 text-white rounded p-2">Voltar</a>
                    <a href="{{route('medicamentos.edit', $medicamento->id)}}" class="bg-purple-500 text-white rounded p-2"><i class="fa-solid fa-pen-to-square p-2"></i>Editar</a>
                    <form action="{{route('medicamentos.destroy', $medicamento->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="pet_id" id="pet_id" value="{{ $medicamento->pet_id}}">
                        <button type="submit" class="bg-red-500 text-white rounded p-2" onclick="return confirm('Tem certeza que deseja excluir o registro?')"><i class="fa-solid fa-trash p-2"></i>Excluir</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
