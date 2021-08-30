@extends('template.main')
@section('content')
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
                <label for="exampleInputEmail1" class="form-label">Max. Joueurs :</label>
                <input type="number" min="0" name="joueursMax" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Continent :</label>
                <select class="form-select" aria-label="Default select example">
                    @foreach ($continents as $continent)
                        <option value="{{ $continent->id }}">{{ $continent->continent }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
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
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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
                        <td>{{ $equipe->continents->joueursMax }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
