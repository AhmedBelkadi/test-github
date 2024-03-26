<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        @media only screen and (max-width: 600px) {
            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="table-responsive text-nowrap">
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>CIN</th>
            <th>Apogeer</th>
            <th>CNE</th>
            <th>Email</th>
            <th>Tele</th>
            <th>Adresse</th>
            <th>Filiere</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $etudiants as $etudiant )
            <tr>
                <td>{{$etudiant->user->name}}</td>
                <td>{{$etudiant->user->cin}}</td>
                <td>{{$etudiant->apogee}}</td>
                <td>{{$etudiant->cne}}</td>
                <td>{{$etudiant->user->email}}</td>
                <td>{{$etudiant->user->tele}}</td>
                <td>{{$etudiant->user->adresse}}</td>
                <td>{{$etudiant->filiere->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
