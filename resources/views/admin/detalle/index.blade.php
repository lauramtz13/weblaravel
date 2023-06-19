@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">        
        @include('admin.sidebar')
        <div class="col-sm-10">          
            
            <table class="table table-striped">
                <tr>
                    <th>N°</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Total</th>
                </tr>
                @foreach ($detalles as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->producto->name }}</td>
                        <td>{{$r->cantidad}}</td>
                        <td>{{$r->preciototal}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection