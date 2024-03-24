<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Pet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicamentoController extends Controller
{
    public function meuPet(Pet $id) {
        $pet = Pet::where('id', $id->id)->first();
        //dd($pet);
        $medicamentos = Medicamento::where('pet_id', $pet->id)->orderBy('aplicado', 'desc') ->paginate('5');

        return view('medicamentos.index', compact('medicamentos', 'pet'));
     }

    public function index(Pet $id)
    {
        //$pet = Pet::where('user_id', Auth::user()->id)->first();
        //$medicamentos = $pet->medicamentos()->paginate('5');


        //return view('medicamentos.index', compact('pet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pet $pet, $id)
    {
        $pet = Pet::where('id', $id)->first();
        return view('medicamentos.create', compact('pet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pet_id = $data['pet_id'];

        Medicamento::create($data);

        return redirect()->route('medicamentos.meuPet', $pet_id)
            ->with('msg', 'Medicamento cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        return view('medicamentos.show', compact('medicamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        //$apartamentos = Apartamento::orderBy('bloco')->orderBy('apartamento')->get();

        return view('medicamentos.edit', compact('medicamento'));
    }


    public function update(Request $request, Medicamento $medicamento)
    {
        $data = $request->all();

        $medicamento->update($data);

        return redirect()->route('medicamentos.show', compact('medicamento'))
            ->with('msg', 'Medicamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        try {
            $medicamento->delete();

            return redirect()->route('pets.index')
            ->with('msg', 'Medicamento excluida com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('petss.index')
            ->with('msg', 'Medicamento não pode ser excluido porque possui morador(es) vinculado(s)!');
        }
    }
}
