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
                    <p class="text-center font-bold">CADASTRO DE FOTO PARA O PET {{ $pet->nome}}</p>
                    <form method="POST" action="{{ route('pet_photos.store', $pet->id) }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="pet_id" name="pet_id" value="{{ $pet->id}}">

                        <div class="grid justify-items-center ">

                            <div class="mt-4 mb-4">
                                <label>Foto(s)</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                name="images[]" type="file" multiple required/>
                            </div>
                        </div>


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
