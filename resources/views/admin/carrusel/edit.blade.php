@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        @include('admin.sidebar')
        <div class="col-sm-10 p-5 bg-light">
        <h1 class="fw-bold fs-3">EDITAR CARRUSEL</h1>      
        {!! Form::open(['route'=>['carrusel.update',$carrusel],'method'=>'PUT','files'=>true]) !!}                                 
        <div class="form-group row mt-5">
            <div class="col-sm-6">
                {!! Form::label('name','NOMBRE') !!}
                {!! Form::text('name',$carrusel->name,['class'=>'form-control','required']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('link','LINK') !!}
                {!! Form::url('link',$carrusel->link,['class'=>'form-control','required']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('order','ORDEN') !!}
                {!! Form::number('order',$carrusel->order,['class'=>'form-control','required']) !!}
            </div>
        </div>               
        <div class="form-group mt-5">
            {!! Form::label('image','IMAGE',['class'=>'control-label']) !!}<br>
            <img src="/img/carrusel/{{$carrusel->image}}" class="img-fluid">
            {!! Form::file('image',['class'=>'form-control']) !!}
        </div>  
        <div class="form-group mt-5">
            {{ Form::submit('EDITAR',['class'=>'btn btn-primary']) }}
        </div>

        {!! Form::close() !!}
        </div>  
    </div>
</div>
@endsection