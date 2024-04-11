{{-- resources/views/user_representations/index.blade.php --}}

@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Mes Réservations</h2>
    @if($representations ->isEmpty())
        <p>Vous n'avez aucune réservation.</p>
        
    @else

        <ul class="list-group">
        @foreach ($representations as $representation)
          <div>
        <h3>Show: {{ $representation->show->title }}</h3>
        <p>Date: {{ $representation->when }}</p>
          </div>
@endforeach
        </ul>
    @endif
        

</div>
@endsection
