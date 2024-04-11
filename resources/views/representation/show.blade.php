@extends('layouts.main')

@section('title', 'Fiche d\'une représentation')

@section('content')
    <article>
        <h1>Représentation du {{ $date }} à {{ $time }}</h1>
        <p><strong>Spectacle:</strong> {{ $representation->show->title }}</p>

        <p><strong>Lieu:</strong> 
        @if($representation->location)
            {{ $representation->location->designation }}
        @elseif($representation->show->location)
            {{ $representation->show->location->designation }}
        @else
            <em>à déterminer</em>
        @endif
        </p>
        @php
           $currentDateTime = date('Y-m-d H:i');
        @endphp

        <!-- Tableau pour choisir le nombre de places par catégorie -->
        <form action="{{ route('cart.store') }}" method="POST">
           <input type="hidden" name="show_title" value="{{ $representation->show->title }}">
           <input type="hidden" name="date" value="{{ $date }}">
           <input type="hidden" name="time" value="{{ $time }}">
           <input type="hidden" name="location" value="{{ $representation->location ? $representation->location->designation : ($representation->show->location ? $representation->show->location->designation : 'à déterminer') }}">
           <input type="hidden" name="price_adult" value="{{ $representation->show->price }}">
            <input type="hidden" name="price_senior" value="{{ $representation->show->price - 2 }}">
            <input type="hidden" name="price_student" value="{{ $representation->show->price / 2 }}">
            <input type="hidden" name="representation_id" value="{{ $representation->id }}">
            <input type="hidden" name="current_date_time" value="{{ $currentDateTime }}">

            

            @csrf <!-- Sécurité pour les formulaires Laravel -->
            <div class="form-group">
                <label for="places">Nombre de places par catégorie :</label>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Profil</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Adulte</td>
                            <td>{{ $representation->show->price }} €</td>
                            <td>
                                <select class="form-control" name="places[adult]">
                                    @for ($i = 0; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Senior</td>
                            <td>{{ $representation->show->price - 2 }} €</td>
                            <td>
                                <select class="form-control" name="places[senior]">
                                    @for ($i = 0; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Étudiant</td>
                            <td>{{ $representation->show->price / 2 }} €</td>
                            <td>
                                <select class="form-control" name="places[student]">
                                    @for ($i = 0; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary" type="submit">Réserver</button>
        </form>
    </article>
 

    <a href="{{ route('representation.index') }}"><button class="btn btn-primary" type="submit">Retour aux spectacles</button></a>
    <!-- <nav><a href="{{ route('representation.index') }}">Retour à l'index</a></nav> -->
@endsection
