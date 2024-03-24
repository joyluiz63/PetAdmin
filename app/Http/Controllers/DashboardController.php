<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $pets = $user->pets()->paginate('5');

        return view('dashboard', compact('pets'));
    }
}
