@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        @include('admin.sidebar')
        <div class="col-sm-10 p-5 bg-light">
        <h1 class="fw-bold fs-3">CREAR BLOG</h1>       
        {!! Form::open(['route'=>'blog.store','method'=>'POST','files'=>true]) !!}               
        <div class="card bg-white">
            <div class="card-body">
                <p class="fw-bold fs-5">SEO</p>
                <div class="form-group row">
                    <div class="col-sm-4">
                        {!! Form::label('slug','SLUG') !!}
                        {!! Form::text('slug',null,['class'=>'form-control','required']) !!}
                    </div>  
                    <div class="col-sm-8">              
                        {!! Form::label('seo_title','TITLE') !!}
                        {!! Form::text('seo_title',null,['class'=>'form-control','required','maxlength'=>'60']) !!}
                    </div>
                </div>      
                <div class="form-group">
                    {!! Form::label('seo_description','DESCRIPTION') !!}
                    {!! Form::textarea('seo_description',null,['class'=>'form-control','maxlength'=>'155','rows'=>'2']) !!}
                </div>      
            </div>
        </div>
                
        <div class="form-group row mt-5">
            <div class="col-sm-6">
                {!! Form::label('name','NOMBRE') !!}
                {!! Form::text('name',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('producto_id','Producto') !!}
                {!! Form::select('producto_id',$productos,null,['class'=>'form-control','placeholder'=>'Elije un producto','required']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('orden','ORDEN') !!}
                {!! Form::text('orden',null,['class'=>'form-control','required']) !!}
            </div>
        </div>               

        <div class="form-group mt-5">
            {!! Form::label('description','DESCRIPCIÓN') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
            <script>CKEDITOR.replace("description");</script>
        </div>  
        
        
        
        <div class="form-group mt-5">
            {!! Form::label('seo_image','SEO IMAGE',['class'=>'control-label']) !!}<br>
            <img src="/img/blog/seo_image.jpg" class="img-fluid ">
            {!! Form::file('seo_image',['class'=>'form-control']) !!}
        </div>
        <div class="form-group mt-5">
            {!! Form::label('image','IMAGE',['class'=>'control-label']) !!}<br>
            <img src="/img/blog/image.jpg" class="img-fluid">
            {!! Form::file('image',['class'=>'form-control']) !!}
        </div>  

        
      
        <div class="form-group p-2 mt-5">            
            <div class="form-check form-switch">                
                {!! Form::checkbox("publicado", null, null,["class"=>"form-check-input"]) !!}                
                {!! Form::label('publicado','Publicado',["class"=>"form-check-label"]) !!}  
            </div>
        </div>

        <div class="form-group mt-5">
            {{ Form::submit('CREAR',['class'=>'btn btn-primary']) }}
        </div>

        {!! Form::close() !!}
        </div>  
    </div>
</div>
@endsection