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
    <div class="container text-center">
        <div class="row">
            <div class="col s12">
                <h1>CRUD IN LARAVEL 10</h1>

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <a href="{{ Route('add') }}" class="btn btn-primary my-3">Ajouter un étudiant</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Class</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                        @php
                            $i = 0;
                        @endphp

                        @foreach ( $etudiants as $etudiant )
                        
                            <tr>
                                <th scope="row">{{ $i += 1 }}</th>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->classe }}</td>
                                <td>
                                    <a href="{{ Route('edit', ['id' => $etudiant->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ Route('delete', $etudiant->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer {{ $etudiant->nom }} ?' )" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                        @endforeach
                       
                    </tbody>
                </table>

                {{ $etudiants->links() }}

            </div>
        </div>
    </div>
    
</body>
</html>