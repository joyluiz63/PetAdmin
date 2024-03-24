<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Vacina;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VacinaController extends Controller
{
    public function meuPet(Pet $id) {
        $pet = Pet::where('id', $id->id)->first();
        //dd($pet);
        $vacinas = Vacina::where('pet_id', $pet->id)->paginate('5');

        return view('vacinas.index', compact('vacinas', 'pet'));
     }

    public function index(Pet $id)
    {
        //$pet = Pet::where('user_id', Auth::user()->id)->first();
        //$vacinas = $pet->vacinas()->paginate('5');


        //return view('vacinas.index', compact('pet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pet $pet, $id)
    {
        $pet = Pet::where('id', $id)->first();
        return view('vacinas.create', compact('pet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pet_id = $data['pet_id'];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $ImagePath = $request->image->store('img/vacinas', 'public');
            $data['image'] = $ImagePath;
        }

        Vacina::create($data);

        return redirect()->route('vacinas.meuPet', $pet_id)
            ->with('msg', 'Vacina cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacina $vacina)
    {
        return view('vacinas.show', compact('vacina'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacina $vacina)
    {
        //$apartamentos = Apartamento::orderBy('bloco')->orderBy('apartamento')->get();

        return view('vacinas.edit', compact('vacina'));
    }


    public function update(Request $request, Vacina $vacina)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if($vacina->image && Storage::disk('public')->exists($vacina->image)) {
                Storage::disk('public')->delete($vacina->image);
            }

            $ImagePath = $request->image->store('img/vacinas', 'public');
            $data['image'] = $ImagePath;
        }

        $vacina->update($data);

        return redirect()->route('vacinas.show', compact('vacina'))
            ->with('msg', 'Vacina atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacina $vacina)
    {
        try {
            $vacina->delete();

            return redirect()->route('pets.index')
            ->with('msg', 'Vacina excluida com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('petss.index')
            ->with('msg', 'Vacina não pode ser excluido porque possui morador(es) vinculado(s)!');
        }
    }

    public function trash()
    {
        $vacinas = Vacina::onlyTrashed()->paginate(6);

        return view('vacinas.index', compact('vacinas'));
    }

    public function restore(Vacina $vacina, Request $request)
    {
        //Vacina::withTrashed()->where('id', $vacina)->restore();
        $vacina->restore();

        return redirect('vacinas');
    }
}
