<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Composition du Plat</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Composition du Plat</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Libellé</th>
                <th>Quantité</th>
                <th>Unité</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compositions as $composant)
            <tr>
                <td>{{ $composant->id }}</td>
                <td>{{ $composant->libelle }}</td>
                <td>{{ $composant->pivot->quantite }}</td>
                <td>{{ $composant->pivot->unité }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>