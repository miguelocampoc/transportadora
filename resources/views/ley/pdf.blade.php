<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <style>
       .text-title{
         font-size: 18px;
         font-weight: bold;
       }
       .text{
        font-size: 16px;

       }
       .container{
        margin-right:20%;
        margin-left:20%;
        border: 1px solid lightgray;
        text-align:center;

       }


    </style>
    <div class="container" >
        <p class="text-title">Datos del conductor</p>
        <p class="text"> Nombres: {{$data->nombre}} </p>
        <p class="text"> Apellidos: {{$data->apellido}} </p>
        <p class="text"> Cedula: {{$data->cedula}} </p>
        <p class="text"> licencia: {{$data->licencia}} </p>
        <br>
        <p class="text-title">Comprobante del material</p>
        <p class="text"> Fecha de entrada: {{$data->fecha_entrada}} </p>
        <p class="text"> Fecha de salida: {{$data->fecha_salida}} </p>
        <p class="text" > Cliente: {{$data->cliente}} </p>
        <p class="text"> Producto: {{$data->producto}} </p>
        <p class="text"> Cargue: {{$data->cargue}} </p>
        <p class="text"> Descargue: {{$data->descargue}} </p>
        <p class="text"> Ciudad entrada: {{$data->ciudad_entrada}} </p>
        <p class="text"> Ciudad salida: {{$data->ciudad_salida}} </p>
        <p class="text"> Peso entrada: {{$data->peso_entrada}} </p>
        <p class="text"> Peso salida: {{$data->peso_salida}} </p>
        <p class="text"> Observaciones :{{$data->observaciones}} </p>
    </div>


</body>

</html>