@extends('template.main')
@section('content')
    <section class="container py-5">
        <div class="row">
            @foreach ($alljoueurs as $alljoueur)
                <div class="col-4 mb-5">
                    <div class="card" style="width: 18rem;">
                        <img height="250px" src="{{ asset('storage/img/' . $alljoueur->photos->src) }}" class="card-img-top"
                            alt="photo de profile">
                        <div class="card-body">
                            <h5 class="card-title">{{ $alljoueur->prenom . ' ' . $alljoueur->nom }}</h5>
                            <p class="card-text">Équipe : {{ $alljoueur->equipes->nom }}</p>
                            <a class="btn btn-primary text-white" title="Show player"
                                    href="/joueur/{{$alljoueur->id}}/show"><i class="px-2 fas fa-eye text-white"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
