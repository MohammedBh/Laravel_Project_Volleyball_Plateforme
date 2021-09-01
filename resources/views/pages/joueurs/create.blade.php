@extends('template.main')
@section('content')
    @if (session()->has('statut'))
        <div class="container alert alert-warning mt-2 w-50">
            {{ session()->get('statut') }}
        </div>
    @endif
    <section>
        <form action="/joueur" method="POST" enctype="multipart/form-data" class="container w-50 mb-5">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom du joueur :</label>
                <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prénom du joueur :</label>
                <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Age :</label>
                <input type="number" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Téléphone :</label>
                <input type="number" min="0" name="telephone" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail :</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Genre:</label>
                <select name="genre" class="form-select mb-3" aria-label="Default select example">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pays d'origine :</label>
                <input type="text" name="pays" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Role :</label>
                <select name="role_id" class="form-select mb-3" aria-label="Default select example">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Equipe:</label>
                <select name="equipe_id" class="form-select mb-3" aria-label="Default select example">
                    <option value="NULL">Aucune Équipe</option>
                    @foreach ($equipes as $equipe)
                        <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Photo de profile :</label>
                <input class="form-control" name="src" type="file" id="formFile">
            </div>

            <button type="submit" class="btn btn-primary text-white px-4"><i class="fas fa-plus"></i></button>
        </form>
    </section>
    <section>
        <table class="table container w-75 mt-5">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Nom</th>
                    <th class="text-center" scope="col">Prenom</th>
                    <th class="text-center" scope="col">Age</th>
                    <th class="text-center" scope="col">Télephone</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">Genre</th>
                    <th class="text-center" scope="col">Pays</th>
                    <th class="text-center" scope="col">Role</th>
                    <th class="text-center" scope="col">Equipe</th>
                    <th class="text-center" scope="col">Photo</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs as $joueur)
                    <tr>
                        <th class="text-center" scope="row">{{ $joueur->id }}</th>
                        <td class="text-center">{{ $joueur->nom }}</td>
                        <td class="text-center">{{ $joueur->prenom }}</td>
                        <td class="text-center">{{ $joueur->age }}</td>
                        <td class="text-center">{{ $joueur->telephone }}</td>
                        <td class="text-center">{{ $joueur->email }}</td>
                        <td class="text-center">{{ $joueur->genre }}</td>
                        <td class="text-center">{{ $joueur->pays }}</td>
                        <td class="text-center">{{ $joueur->roles->role }}</td>
                        <td class="text-center">{{ $joueur->equipes->nom }}</td>
                        <td class="text-center">{{ $joueur->photos->src }}</td>
                        <td class="text-center">
                            <a class="btn btn-success text-white" href="/joueur/{{ $joueur->id }}/edit"><i class="fas fa-edit px-2"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="/joueur/{{ $joueur->id }}" method="POST">
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
