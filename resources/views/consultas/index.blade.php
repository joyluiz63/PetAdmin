<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>
                </div>
            </div>

            <div class="overflow-hidden shadow-sm sm:rounded-lg mt-4 gap-4">
                <div class="bg-white p-6 text-gray-900 flex justify-center">
                    <div class="grid grid-cols-4 gap-4 justify-center">
                        <div class="col-start-2 col-span-2">
                            <p class="text-lg font-semibold"> Consultas do Pet {{ $pet->nome }} cadastrados:</p>
                        </div>

                        <div class="col-start-4">
                            <a href="{{ route('consultas.create', $pet->id) }}"
                                class="bg-blue-400 text-white font-bold p-2 rounded-lg">Cadastrar Consulta</a>
                                <a href="{{route('pets.index', Auth::user()->id)}}" class="bg-blue-500 text-white rounded p-2">Voltar</a>
                        </div>

                    </div>



                </div>
                <div class="flex justify-center">
                    <table class="table table-auto border-separate border-spacing-2 border border-slate-500">
                        <thead>
                            <tr class="text-center font-semibold">
                                <td class="border border-slate-600">Consultou em</th>
                                <td class="border border-slate-600">Clinica</th>
                                <td class="border border-slate-600">Profissional</th>
                                <td class="border border-slate-600">Motivo</th>
                                <td class="border border-slate-600">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consultas as $consulta)
                                <tr class="hover:bg-blue-200">
                                    <td class="border border-slate-600">{{ date('d-m-Y', strtotime($consulta->realizada)) }}</td>
                                    <td class="border border-slate-600">{{ $consulta->clinica }}</td>
                                    <td class="border border-slate-600">{{ $consulta->profissional }}</td>
                                    <td class="border border-slate-600">{{ $consulta->motivo }}</td>
                                    <td class="px-4"><a href="{{ route('consultas.show', $consulta->id) }}"
                                            class="bg-yellow-500 text-white font-semibold px-1 py-1"><i
                                                class="fa-solid fa-eye px-2"></i>Ver</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $consultas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
