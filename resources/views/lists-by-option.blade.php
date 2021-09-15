<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de {{ $name_status }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid mt-4 mr-4 ml-4 mb-6">
    <div class="row bg-secondary mb-2">
        <div class="col-12 text-center">
            <h1>Listado de {{ $name_status }}</h1>
        </div>
    </div>

    <table class="table table-sm table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Nombre</th>
            <th scope="col" class="text-center">Cedula</th>
            <th scope="col" class="text-center">Telefono</th>
            <th scope="col" class="text-center">Telefono 2</th>
            <th scope="col" class="text-center">VOTO</th>
        </tr>
        </thead>
        <tbody>
        @foreach($voters as $item)
            <tr>
                <th scope="row" class="text-center">{{$loop->iteration}}</th>
                <td>{{$item->name}} {{$item->last}}</td>
                <td>{{$item->dni}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->phone2}}</td>
                <td>{{$item->lider->name . ' ' . $item->lider->last }}</td>
                <td class="text-center">
                    @if($item->status == 1)
                        <span class="font-semibold text-center"> INGRESADO - NO LLAMADO </span>
                    @elseif ($item->status == 2)
                        <span class="font-semibold text-center"> LLAMADO - NO CONTESTA </span>
                    @elseif ($item->status == 3)
                        <span class="font-semibold text-center"> LLAMADO - NÚMERO EQUIVOCADO </span>
                    @elseif ($item->status == 4)
                        <span class="font-semibold text-center"> LLAMADO - MAL ESCRITO O APAGADO </span>
                    @elseif ($item->status == 5)
                        <span class="font-semibold text-center"> LLAMADO - FUERA DEL RANGO </span>
                    @elseif ($item->status == 6)
                        <span class="font-semibold text-center"> LLAMADO - NO SABE NO RESPONDE </span>
                    @elseif ($item->status == 7)
                        <span class="font-semibold text-center"> LLAMADO - VOTA EN CONTRA </span>
                    @elseif ($item->status == 8)
                        <span class="font-semibold text-center"> LLAMADO - VOTA EN BLANCO </span>
                    @elseif ($item->status == 9)
                        <span class="font-semibold text-center"> LLAMADO - VOTA A FAVOR </span>
                    @elseif ($item->status == 0)
                        <span class="font-semibold text-center"> LLAMADO - CUELGA - NO DA RESPUESTA </span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
