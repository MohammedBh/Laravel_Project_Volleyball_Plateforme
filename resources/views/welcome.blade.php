@extends('template.main')
@section('content')
    <section class="container my-5 text-center">
        <div class="my-5 py-5">
            <a href="/allequipes"><button type="button" class="btn btn-primary text-white mx-3 py-4 px-5 fs-2">Toutes les
                    Équipes</button></a>
            <a href="/alljoueurs"><button type="button" class="btn btn-primary text-white mx-3 py-4 px-5 fs-2">Tous les
                    Joueurs</button></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3 my-3 mx-2 bgwarning">
                    <h4>Nos Joueurs</h4>
                    <div>
                        @foreach ($hommeRandom as $hommeRandom)
                            <div>
                                <p class="bg-warning">{{ $hommeRandom->nom . ' ' . $hommeRandom->prenom }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-3 my-3 mx-2 bgwarning">
                    <h4>Nos Joueuses</h4>
                    @foreach ($femmeRandom as $femmeRandom)
                        <div>
                            <p class="bg-warning">{{ $femmeRandom->nom . ' ' . $femmeRandom->prenom }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-3 my-3 mx-2 bgwarning">
                    <h4>Equipes hors Europe</h4>
                    @foreach ($horsEurope as $hors)
                        <div>
                            <p class="bg-warning">{{ $hors->nom }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-3 my-3 mx-2 bgwarning">
                    <h4>Equipes d'Europe</h4>
                    @foreach ($Europe as $europe)
                        <div>
                            <p class="bg-warning">{{ $europe->nom }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-3 my-3 mx-2 bgwarning">
                    <h4>4 joueurs avec Equipe</h4>
                </div>
                <div class="col-3 my-3 mx-2 bgwarning">
                    <h4>4 joueurs sans Equipe</h4>
                </div>
            </div>
        </div>
    </section>
@endsection
