<?php

// Dans App\Http\Controllers\UserRepresentationController.php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\UserRepresentation; // Ajustez le chemin selon l'emplacement de votre modèle

class UserRepresentationController extends Controller
{
    public function index()
    {
        // Assurez-vous que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        // Récupère l'objet utilisateur connecté
        $user = Auth::user();

        // Récupère les représentations avec les détails du show pour l'utilisateur connecté
        $representations = Auth::user()->representations()->with('show')->get();

        return view('user_representations.index', compact('representations'));

                                 

    }
}
