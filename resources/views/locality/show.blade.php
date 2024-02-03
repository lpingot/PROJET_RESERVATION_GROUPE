@extends('layouts.main')

@section('title', 'Fiche d\'une localité')

@section('content')
    <h1>{{ ucfirst($locality->locality) }}</h1>
    <nav><a href="{{ route('locality.index') }}">Retour à l'index</a></nav>
@endsection
