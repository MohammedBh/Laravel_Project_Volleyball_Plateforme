@extends('template.main')
@section('content')
    <section>
        <div class="container mt-5">
            <form action="/joueur/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom:</label>
                    <input type="text" name="nom" value="{{ $edit->nom }}" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Prenom:</label>
                    <input type="text" name="prenom" value="{{ $edit->prenom }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Age:</label>
                    <input type="number" name="age" value="{{ $edit->age }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Télephone:</label>
                    <input type="number" name="telephone" value="{{ $edit->telephone }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email:</label>
                    <input type="email" name="email" value="{{ $edit->email }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <label for="exampleInputEmail1" class="form-label">Genre:</label>
                <select name="genre" value="{{ $edit->genre }}" class="form-select mb-3"
                    aria-label="Default select example">
                    <option>Choisir un genre</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pays:</label>
                    <input type="text" name="pays" value="{{ $edit->pays }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div>
                    <label for="exampleInputEmail1" class="form-label">Role :</label>
                    <select name="role_id" class="form-select mb-3" value="{{ $edit->role_id }}"
                        aria-label="Default select example">
                        <option selected>Choisir un role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $edit->role_id == $role->role ? 'selected' : null }}>
                                {{ $role->role }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="exampleInputEmail1" class="form-label">Équipe :</label>
                    <select name="equipe_id" class="form-select mb-3" value="{{ $edit->equipe_id }}"
                        aria-label="Default select example">
                        <option selected>Choisir une equipe</option>
                        @foreach ($equipes as $equipe)
                            <option value="{{ $equipe->id }}"
                                {{ $edit->equipe_id == $equipe->nom ? 'selected' : null }}>{{ $equipe->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Photo de profile :</label>
                    <input class="form-control" name="src" type="file" id="formFile">
                </div>
                <button type="submit" class="btn btn-primary text-white">Update</button>
            </form>
        </div>
    </section>
@endsection
