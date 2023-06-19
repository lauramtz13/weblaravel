@extends('layouts.page')

@section('content')
<div class="container mt-5 mb-5">
    <h1 class="text-center h4 pt-3 pb-3">CARRITO DE COMPRA</h1>   
    @if (count(Cart::getContent()))
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>              
                <th scope="col"> <p class="text-center m-0">PRODUCTO</p> </th>  
                <th scope="col"> <p class="text-center m-0">NOMBRE</p> </th>                           
                <th scope="col"> <p class="text-center m-0">CANTIDAD</p> </th>
                <th scope="col"> <p class="text-center m-0">PRECIO U.</p> </th>
                <th scope="col"> <p class="text-center m-0">IMPORTE</p> </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach(Cart::getContent() as $p)
            <tr>
                <td>
                    <img src="/img/producto/{{$p->attributes->image}}" width="200" class="img-thumbnail mx-auto d-block rounded-lg">
                </td>
                <td>
                    {{$p->name}} 
                </td>
                <td>
                    {{$p->quantity}} 
                </td>
                <td>
                    {{number_format($p->price,2)}} 
                </td>
                <td>
                    {{number_format($p->price * $p->quantity,2)}} 
                </td>
                <td>

                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3"></td>
                <td class="font-weight-bolder">SUBTOTAL </td>
                <td class="font-weight-bolder">USD {{number_format(Cart::getSubTotal(),2)}}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td class="font-weight-bolder">IMPUESTO 18% </td>
                <td class="font-weight-bolder">USD {{number_format(Cart::getSubTotal()*0.18,2)}}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td class="font-weight-bolder">TOTAL </td>
                <td class="font-weight-bolder">USD {{number_format(Cart::getTotal()+Cart::getSubTotal()*0.18,2)}}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <hr>
        <div class="col-sm-12 text-center bg-light mt-5 mb-5 p-5">
            @if (Auth::user()!=null)
                <!-- PROCESA EL PEDIDO-->
                <a href="/store/procesar" class="btn btn-danger btn-block">PROCESAR PEDIDO</a>
            @else
                <!-- AUTTENTICACION-->   
                <p>Para procesar el pedido debe iniciar sesión con su cuenta</p> 
                <a href="/login" rel="nofollow" class="btn btn-danger btn-block">INICIA SESION</a>
            @endif
        </div>



    @else
    
        <p class="text-center">Carrito Vacio <a href="/" class="btn btn-link">Hacer un pedido</a> </p>

    @endif
</div>
@endsection
