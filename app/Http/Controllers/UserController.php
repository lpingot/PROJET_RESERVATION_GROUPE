<?php

// Dans app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté
        return view('user.profile', ['user' => $user]);
    }
}