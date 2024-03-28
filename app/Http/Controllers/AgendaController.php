<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacina;
use App\Models\Consulta;
use App\Models\Medicamento;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function meuPet($id)
    {
        //Recuperar compromissos/tarefas agendadas e ou atrasadas não realizadas
        $pets = Pet::where('id', $id)->get();
        $pet = $pets[0];
        $vacinas = Vacina::where('pet_id', '=', $id)
        ->where('aplicada', null)
        ->paginate('3');
        $medicamentos = Medicamento::where('pet_id', '=', $id)
        ->whereNotNull('repetir')
        ->paginate('3');
        $consultas = Consulta::where('pet_id', '=', $id)
        ->where('realizada', null)
        ->paginate('3');

        //dd($pet[0]->nome);
        //dd($vacinas);

        return view('dashboard', compact( 'pet', 'vacinas', 'medicamentos', 'consultas'));
    }
}
