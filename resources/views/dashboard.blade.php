<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border-2 border-blue-500 rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>
                    <p>Atividades/Eventos agendados para o Pet:   <strong>{{$pet->nome}}</strong></p>
                </div>
            </div>

            <div class="overflow-hidden shadow-sm sm:rounded-lg mt-4 grid grid-cols-2 gap-4">
                {{-- INICIO DIV VACINAS --}}
                <div class="bg-yellow-100 p-6 text-gray-900 border-double border-4 border-sky-500 rounded-lg">
                    <p class="text-lg  text-center font-bold underline uppercase">Vacinas</p>
                    <div class="flex justify-center">
                        <table class="w-full border-collapse border border-slate-500">
                            <thead>
                                <tr>
                                    <th class="border border-slate-600 px-2">Vacina</th>
                                    <th class="border border-slate-600 px-2">Dose</th>
                                    <th class="border border-slate-600 px-2">Aplicar em</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacinas as $vacina )
                                <tr>
                                    <td class="border border-slate-700 px-2">{{ $vacina->nome }}</td>
                                    <td class="border border-slate-700 px-2">{{ $vacina->dose }}</td>
                                    <td class="border border-slate-700 px-2">{{ date('d-m-Y', strtotime($vacina->agendada)) }}</td>
                                </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    {{ $vacinas->links()}}
                </div>
                {{-- FIM DIV VACINAS --}}

                {{-- INICIO DIV MEDICAMENTOS --}}
                <div class="bg-yellow-100 p-6 text-gray-900 border-double border-4 border-sky-500 rounded-lg">
                    <p class="text-lg  text-center font-bold underline uppercase">Medicamentos</p>
                    <div class="flex justify-center">
                        <table class="w-full border-collapse border border-slate-500">
                            <thead>
                                <tr>
                                    <th class="border border-slate-600 px-2">Medicamento</th>
                                    <th class="border border-slate-600 px-2">Dose</th>
                                    <th class="border border-slate-600 px-2">Aplicar em</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicamentos as $medicamento )
                                <tr>
                                    <td class="border border-slate-700 px-2">{{ $medicamento->nome }}</td>
                                    <td class="border border-slate-700 px-2">{{ $medicamento->dosagem }}</td>
                                    <td class="border border-slate-700 px-2">{{ date('d-m-Y', strtotime($medicamento->repetir)) }}</td>
                                </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    {{ $medicamentos->links()}}
                </div>
                {{-- FIM DIV MEDICAMENTOS --}}

                {{-- INICIO DIV CONSULTAS --}}
                <div class="bg-yellow-100 p-6 text-gray-900 border-double border-4 border-sky-500 rounded-lg">
                    <p class="text-lg  text-center font-bold underline uppercase">Consultas</p>
                    <div class="flex justify-center">
                        <table class="w-full border-collapse border border-slate-500">
                            <thead>
                                <tr>
                                    <th class="border border-slate-600 px-2">Profissional</th>
                                    <th class="border border-slate-600 px-2">Clínica</th>
                                    <th class="border border-slate-600 px-2">Agendada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultas as $consulta )
                                <tr>
                                    <td class="border border-slate-700 px-2">{{ $consulta->profissional }}</td>
                                    <td class="border border-slate-700 px-2">{{ $consulta->clinica }}</td>
                                    <td class="border border-slate-700 px-2">{{ date('d-m-Y', strtotime($consulta->agendada)) }}</td>
                                </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    {{ $consultas->links()}}
                </div>
                {{-- FIM DIV CONSULTAS --}}


            </div>
        </div>
    </div>
</x-app-layout>
