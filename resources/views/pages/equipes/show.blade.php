@extends('template.main')
@section('content')
    <section>
        <table class="table container w-75 mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom de l'Équipe</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Max. Joueurs</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipes as $equipe)
                    <tr>
                        <th scope="row">{{ $equipe->id }}</th>
                        <td>{{ $equipe->nom }}</td>
                        <td>{{ $equipe->ville }}</td>
                        <td>{{ $equipe->joueursMax }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
