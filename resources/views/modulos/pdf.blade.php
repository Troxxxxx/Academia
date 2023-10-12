<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
    table {
      text-align: center;
      border-collapse: collapse;
    }

    tr,td,th {
      border: 1px solid grey;
    }

    .titulos {
      background-color: lightgreen;
    }

    .Nombre {
      display: flex;
      justify-content: center;

    }
    .title{
        background-color: lightgreen;
    }

    h1 {
      text-align: center;
    }
    .generado{
        text-align: center;
        font-style: italic;
    }
  </style>
    <script>
        let fecha = document.getElementById("fecha");
        var now = new Date();
        fecha.innerHTML = "Fecha de consulta" + now;
    </script>

</head>

<body>
    <div class="cont">
        <div class="nombreCategoria">
            <h1>Categorías</h1>
        </div>
        <div class="fecha" >Fecha de consulta: {{$t}}</div>
    </div>


    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead class ="title">
            <tr>
                <th>Id</th>
                <th>Nombre Categoría</th>
                <th>Estado</th>
                <th>Creado</th>
                <th>Editado</th>
            </tr>
        </thead>

        <tbody>
            @php($i = 1)
            @foreach($categDatos as $item)
            <!-- <div class="">{{$item}}</div>-->
            @if($item->tenants_id)
            <tr>
                <td> {{ $item -> id}} </td>
                <td> {{ $item->NombreCategoria}} </td>
                <td> {{ $item ->estado_id}} </td>
                <td> {{ $item->created_at}} </td>
                <td> {{ $item->updated_at}} </td>
            </tr>
            @endif
            @endforeach

        </tbody>
    </table>
    <footer>
        <div class="data">
            <div class="generado">¡Este documento ha sido generado desde la aplicación APP MARKET!</div>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>