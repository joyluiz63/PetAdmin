<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fotos') }}
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
                            <p class="text-lg font-semibold"> Fotos do Pet {{ $pet->nome }} cadastrados:</p>
                        </div>

                        <div class="col-start-4">
                            <a href="{{ route('pet_photos.create', $pet->id) }}"
                                class="bg-blue-400 text-white font-bold p-2 rounded-lg">Cadastrar Foto</a>
                            <a href="{{ route('pets.index', Auth::user()->id) }}"
                                class="bg-blue-500 text-white rounded p-2">Voltar</a>
                        </div>

                    </div>
                </div>

                <div class="bg-white p-6 text-gray-900 flex justify-center">


                    @foreach ($pet_photos as $pet_photo)
                        <div>
                            <div class="mx-4">
                                <img src="{{ asset('storage/' . $pet_photo->image) }}" alt="foto" class="w-48">
                            </div>

                            <div class="text-center my-2">
                                <a href="{{ route('pet_photos.show', $pet_photo->id) }}"
                                    class="bg-yellow-500 text-white font-semibold px-1 py-1"><i
                                        class="fa-solid fa-eye px-2"></i>Ver</a>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $pet_photos->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
