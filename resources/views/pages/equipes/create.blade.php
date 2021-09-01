@extends('template.main')
@section('content')
    @include('partials.flash')
    <section>
        <form action="/equipe" method="POST" class="container w-50 mb-5">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom de l'Equipe :</label>
                <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ville :</label>
                <input type="text" name="ville" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pays :</label>
                <input type="text" name="pays" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Max. Joueurs (min 7 joueurs ) :</label>
                <input type="number" min="7" name="joueursMax" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Continent :</label>
                <select class="form-select" name="continent_id" aria-label="Default select example">
                    @foreach ($continents as $continent)
                        <option value="{{ $continent->id }}">{{ $continent->continent }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary text-white px-4"><i class="fas fa-plus"></i></button>
        </form>
    </section>
    <section>
        <table class="table container w-75 mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom de l'Équipe</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Max. Joueurs</th>
                    <th scope="col">Continent</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipes as $equipe)
                    <tr>
                        <th scope="row">{{ $equipe->id }}</th>
                        <td>{{ $equipe->nom }}</td>
                        <td>{{ $equipe->ville }}</td>
                        <td>{{ $equipe->pays }}</td>
                        <td>{{ $equipe->joueursMax }}</td>
                        <td>{{ $equipe->continents->continent }}</td>
                        <td class="text-center">
                            <a class="btn btn-success text-white" href="/equipe/{{ $equipe->id }}/edit"><i class="fas fa-edit px-2"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="/equipe/{{ $equipe->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger text-white" type="submit"><i class="fas fa-times px-2"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
