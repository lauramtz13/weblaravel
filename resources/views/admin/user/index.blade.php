@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')
        <div class="col-sm-10">        
            <table class="table table-striped">
                <tr>
                    <th>N°</th>
                    <th>Name</th>
                    <th>Accion</th>
                </tr>
                @foreach ($users as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->name }} <br>
                            <ul>
                                @forelse ($r->pedidos->sortByDesc("created_at") as $item)
                                    <li>Pedido: <a href="{{ route('user.show',$item->id) }}"> {{$item->created_at}}</a></li>
                                @empty
                                    <li>-</li>    
                                @endforelse
                            </ul>
                        </td>
                        <td>
                            <div class="btn-group">                                  
                                <a class="btn btn-success" href="{{ route('user.edit',$r->id) }}">Editar</a>                                
                                <a class="btn btn-success" href="{{ route('generarpdf',$r->id) }}">Generar PDF</a> 
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection