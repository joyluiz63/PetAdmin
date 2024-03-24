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
                        Exibindo Detalhes do Pet {{$pet->nome}}
                    </p>

                </div>

                <div class="p-6 text-gray-900 flex flex-col items-center">
                    <p><strong>Nome: </strong>{{$pet->nome}}</p>
                    <p><strong>Espécie: </strong>{{$pet->especie}}</p>
                    <p><strong>Sexo: </strong>{{$pet->sexo}}</p>
                    <p><strong>Raça: </strong>{{$pet->raca}}</p>
                    <p><strong>Côr: </strong>{{$pet->cor}}</p>
                    <p><strong>Sexo: </strong>{{$pet->nome}}</p>
                    <p><strong>Idade: </strong>{{ $pet->idade }}</p>
                    <p><strong>Data de Nascimento: </strong>{{ date('d-m-Y', strtotime($pet->nascimento)) }}</p>
                    <p><strong>Tutor: </strong>{{$pet->tutor}}</p>

                </div>

                <div class="flex gap-4 justify-center">
                    <a href="{{route('pets.index', Auth::user()->id)}}" class="bg-blue-500 text-white rounded p-2">Voltar</a>
                    <a href="{{route('pets.edit', $pet->id)}}" class="bg-purple-500 text-white rounded p-2"><i class="fa-solid fa-pen-to-square p-2"></i>Editar</a>
                    <form action="{{route('pets.destroy', $pet->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white rounded p-2" onclick="return confirm('Tem certeza que deseja excluir o registro?')"><i class="fa-solid fa-trash p-2"></i>Excluir</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
