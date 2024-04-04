<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
    public function store(Request $request)
    {
        // Validation des entrées
        $validatedData = $request->validate([
            'show_title' => 'required',
            'representation_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'places' => 'required|array',
            'price_adult' => 'required|numeric',
            'price_senior' => 'required|numeric',
            'price_student' => 'required|numeric',
            'current_date_time' => 'required',
            // vous pouvez ajouter plus de champs selon les besoins
        ]);
    
        // Construire les détails de la réservation à partir des données validées
        $reservationDetails = [
            'show_title' => $validatedData['show_title'],
            'representation_id' => $validatedData['representation_id'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'location' => $validatedData['location'],
            'places' => $validatedData['places'],
            'current_date_time' => $validatedData['current_date_time'], // Assurez-vous que cette ligne correspond à votre besoin
            'prices' => [
                'adult' => $validatedData['price_adult'],
                'senior' => $validatedData['price_senior'],
                'student' => $validatedData['price_student']
            ]
        ];
    
        // Stocker les détails dans la session
        session(['reservation' => $reservationDetails]);
    
        // Rediriger l'utilisateur vers la page de résumé du panier
        return redirect()->route('cart.summary');
    }
    

    public function summary()
{
    $reservation = session('reservation', []);

    // Calculer le total ici si nécessaire

    return view('cart.summary', compact('reservation'));
}

public function confirm(Request $request)
{
    // Assurez-vous que l'utilisateur est authentifié pour obtenir user_id
    if (!auth()->check()) {
        return redirect()->route('login'); // Redirection vers la page de connexion si l'utilisateur n'est pas authentifié
    }

    // Récupération des données de la réservation depuis la session
    $reservation = session('reservation', []);

    // Vérifiez si les informations de réservation sont complètes
    if (empty($reservation) || !isset($reservation['places'], $reservation['representation_id'], $reservation['current_date_time'])) {
        // Retourner une erreur ou rediriger si les informations de la réservation sont incomplètes
        return back()->with('error', 'Les informations de réservation sont incomplètes.'); // Assurez-vous que votre vue peut afficher ce message d'erreur
    }
    // Formatage de la date et l'heure actuelles au format souhaité, par exemple "Y-m-d H:i:s"
    $currentDateTime = now()->format('Y-m-d H:i:s');

    // Insertion des données de réservation dans la base de données
    foreach ($reservation['places'] as $type => $quantity) {
        if ($quantity > 0) { // Vérifiez si la quantité de places est supérieure à zéro
            \App\Models\UserRepresentation::create([
                'representation_id' => $reservation['representation_id'],
                'user_id' => auth()->id(), // ID de l'utilisateur connecté
                'places' => $quantity,
                'profile_type' => $type, // Assurez-vous que cette donnée est correcte et attendue
                'date' => $currentDateTime // Utilisez la variable formatée ici
            ]);
        }
    }

    // Effacer la réservation de la session après l'insertion pour éviter les duplications
    session()->forget('reservation');

    // Rediriger l'utilisateur vers une page de remerciement ou de confirmation
    return redirect()->route('reservation.thankyou'); // Assurez-vous que cette route existe
}

    
}
