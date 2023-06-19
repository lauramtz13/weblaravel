@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        @include('admin.sidebar')
        <div class="col-sm-10 p-5 bg-light">
        <h1 class="fw-bold fs-3">EDITAR USUARIO</h1>      
        {!! Form::open(['route'=>['user.update',$user],'method'=>'PUT']) !!}                                 
            <div class="form-group p-2 mt-5">            
                <div class="form-check form-switch">                
                    {!! Form::checkbox("estado", null, $user->estado,["class"=>"form-check-input"]) !!}                
                    {!! Form::label('estado','ACTIVADO',["class"=>"form-check-label"]) !!}  
                </div>
            </div>
            <div class="form-group mt-5">
                {{ Form::submit('EDITAR',['class'=>'btn btn-primary']) }}
            </div>
        {!! Form::close() !!}
        </div>  
    </div>
</div>
@endsection