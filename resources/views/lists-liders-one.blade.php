<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conteo de Votantes por LIDER YAHIR </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid mt-4 mr-4 ml-4 mb-6">
        <div class="row bg-secondary mb-2">
            <div class="col-12 text-center">
                <h1>Conteo de Votantes por LIDER YAHIR</h1>
            </div>
        </div>

        <table class="table table-sm table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Cedula</th>
                <th scope="col" class="text-center">Telefono</th>
                <th scope="col" class="text-center">VOTOS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lider as $item)
                <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td>{{$item->name}} {{$item->last}}</td>
                    <td>{{$item->dni}}</td>
                    <td>{{$item->phone}}</td>
                    <td class="text-center">{{$item->voters->count()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
