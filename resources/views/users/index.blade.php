<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                </div>
            </div>

            <div class="overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="bg-white p-6 text-gray-900 flex justify-center">

                    <table class="table table-auto table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Usuários cadastrados:</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $key => $user)
                                @if ($key % 2 == 0)
                                    <tr class="bg-blue-100">
                                    @else
                                    <tr>
                                @endif
                                <td class="px-4 py-1">{{ $user->name }}</td>
                                <td>{{ $user->level }}</td>
                                <td><a href="{{ route('users.edit', $user->id) }}"
                                        class="bg-blue-500 text-white font-semibold px-1 py-1"><i
                                            class="fa-solid fa-pen px-2"></i>editar</a> </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
