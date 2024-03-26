<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>absences</title>
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

<table>
    <thead>
    <tr>
        <th>Cne</th>
        <th>Etudiant</th>
        <th>Element</th>
        <th>Date</th>
        <th>Periode</th>
        <th>Type seance</th>
        <th>Etat</th>
        @if(\Illuminate\Support\Facades\Auth::user()->role === "admin")
            <th>Filiere</th>
            <th>Par mr (mme)</th>
        @endif

    </tr>
    </thead>
    <tbody>
    @forelse($absences as $absence )
        <tr>
            <td>{{$absence->etudiant->cne}}</td>
            <td>{{$absence->etudiant->user->name}}</td>
            <td>{{$absence->seance->element->name}}</td>
            <td>{{$absence->date}}</td>
            <td>{{$absence->seance->periode->libelle}}</td>
            <td>{{$absence->seance->type}}</td>
            <td>{{$absence->etat}}</td>
            @if(\Illuminate\Support\Facades\Auth::user()->role === "admin")
            <td>{{$absence->seance->element->module->filiere->name}}</td>
            <td>{{ implode(" / ", $absence->seance->element->professeurs->pluck('user.name')->toArray()) }}</td>
            @endif

        </tr>
    @empty
        <tr>
            <td colspan="9">No absences found</td>
        </tr>
    @endforelse
    </tbody>
</table>

</body>
</html>
