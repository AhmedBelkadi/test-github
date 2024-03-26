<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Professors</title>
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

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>CIN</th>
        <th>Email</th>
        <th>Tele</th>
        <th>Adresse</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $professeurs as $professeur )
        <tr>
            <td>{{$professeur->user->name}}</td>
            <td>{{$professeur->user->cin}}</td>
            <td>{{$professeur->user->email}}</td>
            <td>{{$professeur->user->tele}}</td>
            <td>{{$professeur->user->adresse}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
