<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:level');
    }
    public function index()
    {
        return view('users.index', [
            'users' => User::orderBy('name')->paginate('5')
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        User::findOrFail($user->id)->update($request->all());

        return redirect()->route('users.index', $user)->with('msg', 'User atualizado com sucesso!');
    }
}
