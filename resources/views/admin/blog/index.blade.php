@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')
        <div class="col-sm-10">        
            <a href="{{ route('blog.create') }}" class="btn btn-success"> Crear Post</a>
            <table class="table table-striped">
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Accion</th>
                </tr>
                @foreach ($blogs as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->name }}</td>
                        <td>
                            <div class="btn-group">  
                                <a class="btn btn-success" href="{{ route('blog.edit',$r->id) }}">Editar</a>
                                <form action="{{ route('blog.destroy', $r->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-success" type="submit" onclick="return confirm('ESTAS SEGURO DE ELIMINAR?')">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection