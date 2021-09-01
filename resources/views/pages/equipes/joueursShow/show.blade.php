@extends('template.main')
@section('content')
    <section class="container">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/img/' . $joueurs->photos->src) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $joueurs->prenom . ' ' . $joueurs->nom }}</h5>
                <p class="card-text">Age : {{ $joueurs->age }} ans</p>
                <p class="card-text">Genre : {{ $joueurs->genre }}</p>
                <p class="card-text">Numero de tel : {{ $joueurs->telephone }}</p>
                <p class="card-text">Email : {{ $joueurs->email }}</p>
                <p class="card-text">Pays : {{ $joueurs->pays }}</p>
                <p class="card-text">Role : {{ $joueurs->roles->role }}</p>
                <p class="card-text">Équipe : {{ $joueurs->equipes->nom }}</p>
            </div>
        </div>
    </section>
@endsection
