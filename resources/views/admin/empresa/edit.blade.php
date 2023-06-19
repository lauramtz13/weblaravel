@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        @include('admin.sidebar')
        <div class="col-sm-10 p-5 bg-light">
        <h1 class="fw-bold fs-3">EDITAR EMPRESA</h1>      
        {!! Form::open(['route'=>['empresa.update',$empresa],'method'=>'PUT','files'=>true]) !!}                 
        <div class="card bg-white">
            <div class="card-body">
                <p>SEO</p>
                <div class="form-group">                                        
                        {!! Form::label('seo_title','TITLE') !!}
                        {!! Form::text('seo_title',$empresa->seo_title,['class'=>'form-control','required','maxlength'=>'60']) !!}
                </div>      
                <div class="form-group">
                    {!! Form::label('seo_description','DESCRIPTION') !!}
                    {!! Form::textarea('seo_description',$empresa->seo_description,['class'=>'form-control','maxlength'=>'155','rows'=>'2']) !!}
                </div>      
            </div>
        </div>  
        
        <div class="form-group mt-5">
            {!! Form::label('description','DESCRIPCIÓN') !!}
            {!! Form::textarea('description',$empresa->description,['class'=>'form-control']) !!}
            <script>CKEDITOR.replace("description");</script>
        </div>  
        
        
        
        <div class="form-group mt-5">
            {!! Form::label('seo_image','SEO IMAGE',['class'=>'control-label']) !!}<br>
            <img src="/img/empresa/{{$empresa->seo_image}}" class="img-fluid ">
            {!! Form::file('seo_image',['class'=>'form-control']) !!}
        </div>
        <div class="form-group mt-5">
            {!! Form::label('image','IMAGE',['class'=>'control-label']) !!}<br>
            <img src="/img/empresa/{{$empresa->image}}" class="img-fluid">
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