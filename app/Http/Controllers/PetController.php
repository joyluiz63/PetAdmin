<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index(User $user)
    {
        if (Auth::user()->level == 'admin') {
            $pets = Pet::orderBy('created_at')->paginate('5');

            return view('pets.index', compact('pets'));
        } else{
            $user = User::where('id', Auth::user()->id)->first();
            $pets = $user->pets()->paginate('5');

            return view('pets.index', compact('pets'));
        }
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        Pet::create($request->all());

        return redirect()->route('pets.index')->with('msg', 'Pet cadastado com sucesso!');
    }

    public function show(Pet $pet)
    {
        return view('pets.show', [
            'pet' => $pet
        ]);
    }

    public function photo(Pet $pet)
    {
        return view('pets.show', [
            'pet' => Pet::findOrFail($pet)
        ]);
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        Pet::findOrFail($pet->id)->update($request->all());

        return redirect()->route('pets.show', $pet)->with('msg', 'Pet atualizado com sucesso!');
    }

    public function destroy(Pet $pet)
    {
        Pet::findOrFail($pet->id)->delete();

        return redirect()->route('pets.index', Auth::user()->id)->with('msg', 'Pex excluído com sucesso!');
    }
}
