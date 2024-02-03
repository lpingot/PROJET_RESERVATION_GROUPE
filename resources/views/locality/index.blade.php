@extends('layouts.main')

@section('title', 'Liste des localités ')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul>
    @foreach($localities as $locality)
        <li><a href="{{ route('locality.show', $locality->id) }}">{{ $locality->locality}}</a></li>
    @endforeach
    </ul>
@endsection
