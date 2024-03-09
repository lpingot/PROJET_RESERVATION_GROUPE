@extends('layouts.main')

@section('title', 'Ajouter un artiste')

@section('content')
    <h2>Ajouter un artiste</h2>

    <form action="{{ route('artist.store') }}" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
            @error('firstname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
            @error('lastname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="types" class="form-label">Type d'artiste</label>
            <select multiple class="form-select" id="types" name="types[]" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ (collect(old('types'))->contains($type->id)) ? 'selected':'' }} @isset($artist) {{ ($artist->types->contains($type->id)) ? 'selected':'' }} @endisset>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('artist.index') }}" class="btn btn-secondary">Annuler</a>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <h2>Liste des erreurs de validation</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav class="mt-4"><a href="{{ route('artist.index') }}" class="btn btn-outline-secondary">Retour à l'index</a></nav>
@endsection
