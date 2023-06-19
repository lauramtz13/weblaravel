<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista</title>
    <style>
        .text-center{text-align: center}
    </style>
</head>
<body>
    <H1 class="text-center">{{$user->name}}</H1>
    <table width="100%" border >
        @foreach ($user->pedidos as $p)
        <tr>
            <td>PEDIDO COD: {{$p->id}}</td> <td>FECHA PEDIDO: {{$p->created_at}}</td>            
        </tr>    
        <tr>
            <td colspan="2">
                <table width="100%">
                    <tr>
                        <td>Producto</td>
                        <td>Precio Total</td>
                        <td>Cantidad</td>
                    </tr>
                    @foreach ($p->detalles as $d)
                    <tr>
                        <td>{{$d->producto->name}}</td>
                        <td>{{$d->preciototal}}</td>
                        <td>{{$d->cantidad}}</td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        @endforeach        
    </table>
    
</body>
</html>