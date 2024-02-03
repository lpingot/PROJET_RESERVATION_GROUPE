@extends('layouts.main')

@section('title', 'Liste des roles d’artistes')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul>
    @foreach($roles as $role)
        <li><a href="{{ route('role.show', $role->id) }}">{{ $role->role}}</a></li>
    @endforeach
    </ul>
@endsection
