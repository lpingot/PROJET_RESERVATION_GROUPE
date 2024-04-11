{{-- resources/views/user_representations/index.blade.php --}}

@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Mes Réservations</h2>
    @if($representations ->isEmpty())
        <p>Vous n'avez aucune réservation.</p>
        
    @else

        <ul class="list-group">
            @foreach($representations as $representation)
                <li class="list-group-item">
                    Spectacle : {{ $representation->show->title }}<br>
                    Date et Heure : {{ $representation->when }}<br>
                    Lieu : {{ optional($representation->show->location)->name }}<br>
                    Places réservées : {{ $representation->userRepresenation->places }}
                </li>
            @endforeach
        </ul>
    @endif
        

</div>
@endsection
