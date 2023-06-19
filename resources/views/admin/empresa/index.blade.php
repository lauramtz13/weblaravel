@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')
        <div class="col-sm-10">
            <table class="table table-striped">
                <tr>
                    <th>N°</th>
                    <th>Empresa</th>
                    <th>Accion</th>
                </tr>
                @foreach ($empresas as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>Empresa</td>
                        <td>
                            <div class="btn-group">  
                                <a class="btn btn-success" href="{{ route('empresa.edit',$r->id) }}">Editar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection