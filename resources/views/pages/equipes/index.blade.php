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
                @foreach ($allequipes as $allequipe)
                    <tr>
                        <th scope="row">{{ $allequipe->id }}</th>
                        <td>{{ $allequipe->nom }}</td>
                        <td>{{ $allequipe->ville }}</td>
                        <td>{{$allequipe->joueurs->count()}} / {{ $allequipe->joueursMax }}</td>
                        <td class="text-center">
                            <a class="btn btn-primary text-white" title="Show team" href="/allequipe/{{ $allequipe->id }}/show"><i class="fas fa-eye text-white"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
