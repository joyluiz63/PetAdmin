<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\PetPhoto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetPhotoController extends Controller
{
    public function meuPet(Pet $id) {
        $pet = Pet::where('id', $id->id)->first();
        //dd($pet);
        $pet_photos = PetPhoto::where('pet_id', $pet->id)->paginate('4');

        return view('pet_photos.index', compact('pet_photos', 'pet'));
     }

    public function index()
    {
       //
    }

    public function create(Pet $pet, $id)
    {
        $pet = Pet::where('id', $id)->first();
        return view('pet_photos.create', compact('pet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Variavel $data recebe todos os dados vindo fo form atraves do request
        $data = $request->all();
        $pet_id = $data['pet_id'];

        //dd($data);

        /* Lembrar de acrescentar enctype="multipart/form-data" no form e também alterar
        o arquivo  config/filesystems.php: 'default' => env('FILESYSTEM_DISK', 'local'), para
        'default' => env('FILESYSTEM_DISK', 'public'), */
        /* if ($request->hasFile('image') && $request->file('image')->isValid()) {

            // Salva a imagem na pasta storage/public e o caminho na variavel $imagePath
            $ImagePath = $request->image->store('img/pet_photos', 'public');
            $data['image'] = $ImagePath;
        } */

        //PARA SALVAR MAIS DE UMA FOTO
         /* Lembrar de acrescentar enctype="multipart/form-data" no form e também alterar
        o arquivo  config/filesystems.php: 'default' => env('FILESYSTEM_DISK', 'local'), para
        'default' => env('FILESYSTEM_DISK', 'public'), */

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Salva a imagem na pasta storage/public e o caminho na variavel $imagePath
                $imagePath = $image->store('img/pet_photos', 'public');
                $data['image'] = $imagePath;

                PetPhoto::create($data);
            }
        } else {
            return redirect()->route('pet_photos.meuPet', $pet_id)
        ->with('msg', 'Erro: Foto(s) não cadastrado!');
        }

        //PetPhoto::create($data);

        return redirect()->route('pet_photos.meuPet', $pet_id)
            ->with('msg', 'Foto(s) cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PetPhoto $pet_photo)  {
        return view('pet_photos.show', compact('pet_photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PetPhoto $pet_photo)
    {
        //$apartamentos = Apartamento::orderBy('bloco')->orderBy('apartamento')->get();

        return view('pet_photos.edit', compact('pet_photo'));
    }


    public function update(Request $request, PetPhoto $petsPhoto)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if($petsPhoto->image && Storage::disk('public')->exists($petsPhoto->image)) {
                Storage::disk('public')->delete($petsPhoto->image);
            }

            $ImagePath = $request->image->store('img/pet_photos', 'public');
            $data['image'] = $ImagePath;
        }

        $petsPhoto->update($data);

        return redirect()->route('pet_photos.show', compact('petsPhoto'))
            ->with('msg', 'Foto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PetPhoto $pet_photo)
    {
        try {
            $pet_photo->delete();

            return redirect()->route('pets.index')
            ->with('msg', 'Foto excluida com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('petss.index')
            ->with('msg', 'Foto não pode ser excluido porque possui morador(es) vinculado(s)! '. $e);
        }
    }
}
