<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Pet;
use Exception;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function meuPet(Pet $id) {
        $pet = Pet::where('id', $id->id)->first();
        //dd($pet);
        $consultas = Consulta::where('pet_id', $pet->id)->orderBy('realizada', 'desc') ->paginate('5');

        return view('consultas.index', compact('consultas', 'pet'));
     }

    public function index(Pet $id)
    {
        //$pet = Pet::where('user_id', Auth::user()->id)->first();
        //$consultas = $pet->consultas()->paginate('5');


        //return view('consultas.index', compact('pet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pet $pet, $id)
    {
        $pet = Pet::where('id', $id)->first();
        return view('consultas.create', compact('pet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pet_id = $data['pet_id'];

        Consulta::create($data);

        return redirect()->route('consultas.meuPet', $pet_id)
            ->with('msg', 'Consulta cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $consulta)
    {
        return view('consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $consulta)
    {
        //$apartamentos = Apartamento::orderBy('bloco')->orderBy('apartamento')->get();

        return view('consultas.edit', compact('consulta'));
    }


    public function update(Request $request, Consulta $consulta)
    {
        $data = $request->all();

        $consulta->update($data);

        return redirect()->route('consultas.show', compact('consulta'))
            ->with('msg', 'Consulta atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        try {
            $consulta->delete();

            return redirect()->route('pets.index')
            ->with('msg', 'Consulta excluida com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('petss.index')
            ->with('msg', 'Consulta não pode ser excluido porque possui morador(es) vinculado(s)!');
        }
    }
}
