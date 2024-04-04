@extends('layouts.main')

@section('title', 'Liste des représentations')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Salle</th>
                    <th>Horaire</th>
                    <th></th>
                    <th></th> {{-- Cette cinquième colonne est ajoutée sans titre --}}
                </tr>
            </thead>
            <tbody>
                @foreach($representations as $representation)
                    <tr>
                        <td><a href="{{ route('representation.show', $representation->id) }}">{{ $representation->show->title }}</a></td>
                        <td>{{ $representation->location ? $representation->location->designation : 'Non spécifié' }}</td>
                        <td>{{ substr($representation->when, 0, -3) }}</td>
                        <td>
                            <a href="{{ route('representation.show', $representation->id) }}" class="btn btn-info">Réserver</a>
                        </td>
                        <td>
                            <!-- Bouton Infos ajouté ici -->
                            <a href="{{ route('show.show', $representation->show->id) }}" class="btn btn-secondary">Infos</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
