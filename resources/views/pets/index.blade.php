<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>
                    @if (Auth::user()->level != 'admin')
                        <a href="{{route('pets.create')}}" class="bg-blue-400 text-white font-bold p-2 rounded-lg">Cadastrar Pet</a>
                    @endif
                </div>
            </div>

            <div class="overflow-hidden shadow-sm sm:rounded-lg mt-4 gap-4">
                <div class="bg-white p-6 text-gray-900 flex justify-center">

                    <table class="table table-auto border-separate border-spacing-2 border border-blue-500">
                        <thead>
                            <tr>
                                <th>Pets cadastrados:</th>
                            </tr>
                            <tr>
                                <th>Nome</th>
                                <th>Espécie</th>
                                <th>Visualizar</th>
                                <th>Agenda</th>
                                <th>Vacinas</th>
                                <th>Medicamentos</th>
                                <th>Consultas</th>
                                <th>Album Fotos</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($pets as $pet)
                            <tr class="hover:bg-green-200">
                                <td>{{$pet->nome}}</td>
                                <td>{{ $pet->especie}}</td>
                                <td class="text-center"><a href="{{ route('pets.show', $pet->id)}}" class="bg-lime-400 text-white font-semibold px-1 py-1"><i class="fa-solid fa-eye px-2"></i></a> </td>
                                <td class="text-center"><a href="{{ route('agendas.meuPet', $pet->id)}}" class="bg-green-500 text-white font-semibold px-1 py-1"><i class="fa-regular fa-calendar-days px-2"></i></a> </td>
                                <td class="text-center"><a href="{{ route('vacinas.meuPet', $pet->id)}}" class="bg-green-500 text-white font-semibold mx-4 py-1 px-2"><i class="fa-solid fa-syringe px-2"></i></a> </td>
                                <td class="text-center"><a href="{{ route('medicamentos.meuPet', $pet->id)}}" class="bg-green-500 text-white font-semibold px-1 py-1"><i class="fa-solid fa-capsules px-2"></i></a> </td>
                                <td class="text-center"><a href="{{ route('consultas.meuPet', $pet->id)}}" class="bg-green-500 text-white font-semibold mx-4 py-1 px-2"><i class="fa-solid fa-notes-medical px-2"></i></a> </td>
                                <td class="text-center"><a href="{{ route('pet_photos.meuPet', $pet->id)}}" class="bg-green-500 text-white font-semibold mx-4 py-1 px-2"><i class="fa-solid fa-camera px-2"></i></a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$pets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
