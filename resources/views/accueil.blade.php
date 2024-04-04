@extends('layouts.main')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Welcome Card -->
            <div class="card mb-4">
                <div class="card-header">{{ __('Bienvenue au Théâtre de la Ville') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Découvrez notre programme et réservez vos places pour les prochains spectacles. Vivez des moments inoubliables dans l'univers du théâtre.
                </div>
            </div>


            <!-- About the Theatre Section -->
            <div class="card mb-4">
                <div class="card-header">{{ __('À Propos du Théâtre') }}</div>
                <div class="card-body">
                    Situé au cœur de notre magnifique ville, le Théâtre de la Ville est un lieu emblématique de culture et de divertissement. Rejoignez-nous pour vivre des expériences théâtrales mémorables.
                </div>
            </div>

            <!-- Contact Section -->
            <div class="card">
                <div class="card-header">{{ __('Contactez-Nous') }}</div>
                <div class="card-body">
                    Pour toute information ou réservation, contactez-nous au : <strong>(123) 456-7890</strong> ou par email : <strong>info@theatredelaville.com</strong>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

