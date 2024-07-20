<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $persona = null;

        if ($user) {
            $persona = Persona::where('per_cedula', $user->cedula)->first();
        }

        return view('dashboard', compact('persona'));
    }
}
