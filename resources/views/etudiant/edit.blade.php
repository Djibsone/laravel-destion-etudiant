<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <title>Accueil</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1>CRUD IN LARAVEL 10</h1>

                {{-- @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif --}}

                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger"> {{ $error }} </li>
                    @endforeach
                </ul>

                <a href="{{ Route('liste') }}" class="btn btn-info">RETOUR A LA LISTE</a>

                <form class="mt-3" action="{{ Route('update') }}" method="post">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $etudiant->id }}">
                    <div class="row mb-3">
                        <div class="col">
                            <label>Nom *</label>
                            <input type="text" class="form-control" name="nom" value="{{ $etudiant->nom }}" placeholder="Nom">
                        </div>
                        <div class="col">
                            <label>Prénom *</label>
                            <input type="text" class="form-control" name="prenom" value="{{ $etudiant->prenom }}" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>Classe *</label>
                            <select class="form-control" name="classe">
                                <option value="{{ $etudiant->classe ?? null }}">{{ $etudiant->classe ?? 'Sélectionnez la classe' }}</option>
                                <option value="6ème">6ème</option>
                                <option value="5ème">5ème</option>
                                <option value="4ème">4ème</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">MODIFIER UN ETUDIANT</button>
                </form>

            </div>
        </div>
    </div>
    
</body>
</html>